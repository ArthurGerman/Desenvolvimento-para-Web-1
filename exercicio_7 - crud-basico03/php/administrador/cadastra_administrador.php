<?php 
    require_once '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Criptografa a senha

        
        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("INSERT INTO ADMINISTRADOR (USUARIO, SENHA) VALUES (?, ?)");
        $query->execute([$usuario, $senha]);

        header('Location: ./login_administrador.php');
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
            Registro de novo administrador
        </h1>

        <a href="../../index.php">Home</a><br><br>
    </header>

    <form action="" method="post">
        <label for="usuario">Nome do usário: </label><br>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha: </label><br>
        <input type="password" name="senha" id="senha" required><br>
        
        <input type="submit" value="Registrar-se">
    </form>
</body>
</html>