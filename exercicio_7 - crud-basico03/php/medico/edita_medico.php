<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM MEDICO WHERE ID = ?");
    $query->execute([$id]);
    $medico = $query->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $especialidade = $_POST['especialidade'];

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("UPDATE MEDICO SET NOME = ?, ESPECIALIDADE = ? WHERE ID = ?");
        $query->execute([$nome, $especialidade, $id]);
        header("Location: ./visualiza_medico.php?id=$id");
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
            Edição de cadastro de médico
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./visualiza_medico.php?id=<?= $id ?>" style="margin-left: 10px;">Voltar</a><br><br>
    </header>

    <form action="" method="post">
        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome" value="<?= $medico['NOME'] ?>" required><br>

        <label for="especialidade">Especialidade: </label><br>
        <input type="text" name="especialidade" id="especialidade" value="<?= $medico['ESPECIALIDADE'] ?>" required><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>