<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("
        SELECT CONSULTA.ID_CON,
            CONSULTA.DATA_CONSULTA,
            CONSULTA.HORA_CONSULTA,
            CONSULTA.OBSERVACAO,
            PACIENTE.ID AS PACIENTE_ID,
            PACIENTE.NOME AS PACIENTE_NOME,
            PACIENTE.DATA_NASCIMENTO AS PACIENTE_DATA_NASCIMENTO,
            PACIENTE.TIPO_SANGUINEO AS PACIENTE_TIPO_SANGUINEO,
            MEDICO.ID AS MEDICO_ID,
            MEDICO.NOME AS MEDICO_NOME,
            MEDICO.ESPECIALIDADE AS MEDICO_ESPECIALIDADE
        FROM CONSULTA
        
        INNER JOIN PACIENTE ON CONSULTA.ID_PACIENTE = PACIENTE.ID
        INNER JOIN MEDICO ON CONSULTA.ID_MEDICO = MEDICO.ID
        
        WHERE CONSULTA.ID_CON = ?


    ");
    $query->execute([$id]);
    $consultas = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Listagem de consultas</title>
</head>
<body>
    <header>
        <h1>
            Visualização de consulta
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./lista_consulta.php?" style="margin-left: 10px;">Voltar</a><br><br>

    </header>


    <table border="2">
        <thead>
            <tr> 
                <th colspan="4">Consulta</th>
                <th colspan="4">Paciente</th>
                <th colspan="3">Médico</th>
                <th rowspan="2" colspan="2">Ações</th>
            </tr>

            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Observação</th>

                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>

                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $consulta['ID_CON'] ?></td>
                    <td><?= $consulta['DATA_CONSULTA'] ?></td>
                    <td><?= $consulta['HORA_CONSULTA'] ?></td>
                    <td><?= $consulta['OBSERVACAO'] ?></td>
                    <td><?= $consulta['PACIENTE_ID'] ?></td>
                    <td><?= $consulta['PACIENTE_NOME'] ?></td>
                    <td><?= $consulta['PACIENTE_DATA_NASCIMENTO'] ?></td>
                    <td><?= $consulta['PACIENTE_TIPO_SANGUINEO'] ?></td>
                    <td><?= $consulta['MEDICO_ID'] ?></td>
                    <td><?= $consulta['MEDICO_NOME'] ?></td>
                    <td><?= $consulta['MEDICO_ESPECIALIDADE'] ?></td>

                    <td><a href="./edita_consulta.php?id=<?= $consulta['ID_CON']?>">Editar</a></td>
                    <td><a href="./exclui_consulta.php?id=<?= $consulta['ID_CON']?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>