<?php
    require_once 'config.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario_nome = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Verifica se o nome de usuário existe
        $query = $pdo->prepare("SELECT * FROM ADMINISTRADORES WHERE ADM_USERNAME = ?");
        $query->execute([$usuario_nome]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        // Verifica se a senha está correta
        if ($usuario && password_verify($senha, $usuario['ADM_SENHA'])) {
            $_SESSION['user_id'] = $usuario['ADM_ID'];
            $_SESSION['username'] = $usuario['ADM_USERNAME'];
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
    <title>Login</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <header>
        <h1>Seja bem vindo ao Sistema de cadastro de veículos da seguradora</h1>
    </header>

    <a href="../index.php">Home</a><br><br>



    <form action="" method="post">
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required><br>

            <input type="submit" value="Login">
    </form>
</body>
</html>