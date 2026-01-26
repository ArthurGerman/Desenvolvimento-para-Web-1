<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("
        SELECT PACIENTE.ID,
            PACIENTE.NOME,
            PACIENTE.DATA_NASCIMENTO,
            PACIENTE.ID_IMAGEM,
            IMAGEM.PATH,
            PACIENTE.TIPO_SANGUINEO

        FROM PACIENTE

        LEFT JOIN IMAGEM ON PACIENTE.ID_IMAGEM = IMAGEM.ID
        WHERE PACIENTE.ID = ?");
    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $tipo_sanguineo = $_POST['tipo_sanguineo'];

        if (!empty($_FILES['imagem']['name'])) {

            // 1. Apagar imagem antiga (se existir)
            if (!empty($paciente['ID_IMAGEM'])) {

                $query = $pdo->prepare("SELECT PATH FROM IMAGEM WHERE ID = ?");
                $query->execute([$paciente['ID_IMAGEM']]);
                $img = $query->fetch(PDO::FETCH_ASSOC);

                if ($img) {
                    $arquivoAntigo = __DIR__ . '/../../storage/' . $img['PATH'];

                    if (file_exists($arquivoAntigo)) {
                        unlink($arquivoAntigo);
                    }

                    // Apaga do banco
                    $query = $pdo->prepare("DELETE FROM IMAGEM WHERE ID = ?");
                    $query->execute([$paciente['ID_IMAGEM']]);
                }
            }

            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid() . '.' . $extensao;
            $caminho = __DIR__ . '/../../storage/' . $novoNome;

            move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho);

            $query = $pdo->prepare("INSERT INTO IMAGEM (PATH) VALUES (?)");
            $query->execute([$novoNome]);
            $id_imagem = $pdo->lastInsertId();
            


        } else {
            $id_imagem = $paciente['ID_IMAGEM'];
        }

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("UPDATE PACIENTE SET NOME = ?, DATA_NASCIMENTO = ?, ID_IMAGEM = ?, TIPO_SANGUINEO = ? WHERE ID = ?");
        $query->execute([$nome, $data_nascimento, $id_imagem, $tipo_sanguineo, $id]);
        header("Location: ./visualiza_paciente.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Edição de cadastro</title>
</head>
<body>
    <header>
        <h1>
            Edição de cadastro de paciente
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./visualiza_paciente.php?id=<?= $paciente['ID'] ?>" style="margin-left: 10px">Voltar</a><br><br>
        
    </header>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome" value="<?= $paciente['NOME'] ?>" required><br>

        <label for="data_nascimento">Data de nascimento: </label><br>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $paciente['DATA_NASCIMENTO'] ?>" required><br>

        <label for="tipo_sanguineo">Tipo sanguíneo: </label><br>
        <select name="tipo_sanguineo" id="tipo_sanguineo" required>
            <option value="">Selecione</option>
            <option value="A+" <?= $paciente['TIPO_SANGUINEO'] == 'A+' ? 'selected' : '' ?>>A+</option>
            <option value="A-" <?= $paciente['TIPO_SANGUINEO'] == 'A-' ? 'selected' : '' ?>>A-</option>
            <option value="B+" <?= $paciente['TIPO_SANGUINEO'] == 'B+' ? 'selected' : '' ?>>B+</option>
            <option value="B-" <?= $paciente['TIPO_SANGUINEO'] == 'B-' ? 'selected' : '' ?>>B-</option>
            <option value="AB+" <?= $paciente['TIPO_SANGUINEO'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
            <option value="AB-" <?= $paciente['TIPO_SANGUINEO'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
            <option value="O+" <?= $paciente['TIPO_SANGUINEO'] == 'O+' ? 'selected' : '' ?>>O+</option>
            <option value="O-" <?= $paciente['TIPO_SANGUINEO'] == 'O-' ? 'selected' : '' ?>>O-</option>
        </select><br>
        
        <label for="">Imagem do paciente</label><br><br>
        <?php if (!empty($paciente['PATH'])): ?>
            <img src="../../storage/<?= $paciente['PATH'] ?>" alt="Foto do Paciente" style="width:200px; margin-left:30px" >
        <?php else: ?>
            <img src="../../storage/profile.jpg" alt="Sem Foto" style="width:200px; margin-left:30px">
        <?php endif; ?>

        <br><br>

        <label for="imagem">Atualizar imagem do paciente(opcional): </label>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>