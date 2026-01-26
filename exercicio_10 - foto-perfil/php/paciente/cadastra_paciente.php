<?php 
    require_once '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $tipo_sanguineo = $_POST['tipo_sanguineo'];

        // Verificar se foi enviada uma imagem
        if (!empty($_FILES['imagem']['name'])) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid() . '.' . $extensao;
            $caminho = __DIR__ . '/../../storage/' . $novoNome;

            // Mover o arquivo para a pasta storage
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
                // Inserir o caminho da imagem na tabela imagens
                $query = $pdo->prepare("INSERT INTO IMAGEM (path) VALUES (?)");
                $query->execute([$novoNome]);
                $id_imagem = $pdo->lastInsertId();
            }
        } else {
            $id_imagem = null;
        }

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, ID_IMAGEM, TIPO_SANGUINEO) VALUES (?, ?, ?, ?)");
        $query->execute([$nome, $data_nascimento, $id_imagem, $tipo_sanguineo]);
        header('Location: ./lista_paciente.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento</title>
    <link rel="stylesheet" href="../../css/global.css">
</head>
<body>
    <header>
        <h1>
            Registro de novo paciente
        </h1>

        <a href="../../index.php">Home</a><br><br>

    </header>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome" required><br>

        <label for="data_nascimento">Data de nascimento: </label><br>
        <input type="date" name="data_nascimento" id="data_nascimento" required><br>

        <label for="tipo_sanguineo">Tipo sanguíneo: </label><br>
        <select name="tipo_sanguineo" id="tipo_sanguineo">
            <option value="">Selecione</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br>

        <label for="imagem">Imagem do paciente(opcional): </label>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>