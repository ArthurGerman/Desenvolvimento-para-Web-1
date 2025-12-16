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
            Seja bem-vindo ao nosso serviço de agendamento de consultas
        </h1>

        <h3>CRUD básico 03 - 16/12/2025</h3>
        <h3>Aluno: Arthur Germano da Cunha Silva</h3>

        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>

                <h2>Médicos</h2>

                <li>
                    <a href="./php/medico/cadastra_medico.php">Cadastrar novo médico</a>
                </li>
                <li>
                    <a href="./php/medico/lista_medico.php">Listar médicos</a>
                </li>

                <h2>Pacientes</h2>

                <li>
                    <a href="./php/paciente/cadastra_paciente.php">Cadastrar novo paciente</a>
                </li>
                <li>
                    <a href="./php/paciente/lista_paciente.php">Listar pacientes</a>
                </li>

                <h2>Consultas</h2>

                <li>
                    <a href="./php/consulta/cadastra_consulta.php">Cadastrar nova consulta</a>
                </li>
                <li>
                    <a href="./php/consulta/lista_consulta.php">Listar consultas</a>
                </li>
                
                <h2>Logout</h2>
                
                <li>
                    <a href="./php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a>
                </li>

            <?php else: ?>

                <h2>Cadastro/Login</h2>

                <li>
                    <a href="./php/administrador/cadastra_administrador.php">Cadastrar-se</a>
                </li>
                <li>
                    <a href="./php/administrador/login_administrador.php">Login</a>
                </li>

            <?php endif; ?>
        </ul>
    </header>


</body>
</html>