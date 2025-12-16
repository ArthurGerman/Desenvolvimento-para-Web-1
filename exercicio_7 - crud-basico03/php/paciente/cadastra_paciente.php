<?php 
    require_once '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $tipo_sanguineo = $_POST['tipo_sanguineo'];

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (?, ?, ?)");
        $query->execute([$nome, $data_nascimento, $tipo_sanguineo]);
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

    <form action="" method="post">
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

        <input type="submit" value="Registrar">
    </form>
</body>
</html>