<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja bem-vindo</title>
    <link rel="stylesheet" href="./css/global.css">
</head>
<body>

    <header>
        <h1>
            Seja bem-vindo ao nosso serviço de seguro de veículos.
        </h1>
        <h3>
            CRUD básico 02 - 02/12/2025
        </h3>
        <p>
            Aluno: Arthur Germano da Cunha Silva
        </p>

        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li>
                    <a href="php/lista_carros.php">Listar carros cadastrados</a>
                </li>
                <li>
                    <a href="./php/cadastra_carro.php">Cadastrar novo veículo</a>
                </li>
                <li>
                    <a href="./php/logout.php">Logout</a>
                </li>

            <?php else: ?>
                <li>
                    <a href="./php/login_usuario.php">Login</a>
                </li>
                <li>
                    <a href="./php/cadastra_usuario.php">Cadastrar-se</a>
                </li>
            <?php endif; ?>
        </ul>
    </header>


</body>
</html>