<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $especialidade = $_POST['especialidade'];

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (?, ?)");
        $query->execute([$nome, $especialidade]);
        header('Location: ./lista_medico.php');
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
            Registro de novo médico
        </h1>

        <a href="../../index.php">Home</a><br><br>
    </header>

    <form action="" method="post">
        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome" required><br>

        <label for="especialidade">Especialidade: </label><br>
        <input type="text" name="especialidade" id="especialidade" required><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>