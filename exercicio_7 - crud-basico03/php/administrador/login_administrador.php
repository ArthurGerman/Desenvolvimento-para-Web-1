<?php
    require_once '../config.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Verifica se o nome de usuário existe
        $query = $pdo->prepare("SELECT * FROM ADMINISTRADOR WHERE USUARIO = ?");
        $query->execute([$usuario]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        // Verifica se a senha está correta
        if ($usuario && password_verify($senha, $usuario['SENHA'])) {
            $_SESSION['user_id'] = $usuario['ID'];
            $_SESSION['username'] = $usuario['USUARIO'];
            header('Location: /index.php');
        } else {
            echo "<p style='color:red'>Nome de usuário ou senha incorretos!</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Seja bem vindo ao Sistema de cadastro de consultas</h1>
    </header>

    <a href="../../index.php">Home</a><br><br>



    <form action="" method="post">
            <label for="usuario">Usuario: </label><br>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="senha">Senha: </label><br>
            <input type="password" name="senha" id="senha" required><br>

            <input type="submit" value="Login">
    </form>
</body>
</html>