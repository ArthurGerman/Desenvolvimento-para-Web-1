<?php 
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_usuario = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Criptografa a senha

        // Verifica se o nome de usuário já existe
        $query = $pdo->prepare("SELECT * FROM ADMINISTRADORES WHERE ADM_USERNAME = ?");
        $query->execute([$usuario]);

        if ($query->rowCount() > 0) {
            echo "Nome de usuário já existe!";
        } else {
            // Insere o novo usuário no banco de dados
            $query = $pdo->prepare("INSERT INTO ADMINISTRADORES (ADM_NOME, ADM_USERNAME, ADM_SENHA) VALUES (?, ?, ?)");
            if ($query->execute([$nome_usuario, $usuario, $senha])) {
                echo "Usuário registrado com sucesso!";
                header('Location: ./login_usuario.php');
            } else {
                echo "Erro ao registrar usuário.";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <header>
        <h1>
            Registro de novo administrador
        </h1>
    </header>

    <form action="" method="post">
        <label for="nome">Seu nome: </label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="usuario">Nome do usário: </label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha" required><br>
        
        <input type="submit" value="Registrar-se">
    </form>
</body>
</html>