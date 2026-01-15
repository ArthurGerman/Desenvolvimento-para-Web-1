<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $query= $pdo->prepare("
        SELECT CONSULTA.ID_CON,
            CONSULTA.DATA_CONSULTA,
            CONSULTA.HORA_CONSULTA,
            PACIENTE.ID AS PACIENTE_ID,
            PACIENTE.NOME AS PACIENTE_NOME,
            MEDICO.NOME AS MEDICO_NOME,
            MEDICO.ESPECIALIDADE AS MEDICO_ESPECIALIDADE
        FROM CONSULTA

        INNER JOIN PACIENTE ON CONSULTA.ID_PACIENTE = PACIENTE.ID
        INNER JOIN MEDICO ON CONSULTA.ID_MEDICO = MEDICO.ID

        ORDER BY CONSULTA.ID_CON
    ");
    $query->execute();
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
            Listagem de consultas
        </h1>

        <a href="../../index.php">Home</a><br><br>
        
    </header>

    <?php if (!empty($consultas)): ?>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>ID do paciente</th>
                    <th>Nome do paciente</th>
                    <th>Nome do médico</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['ID_CON'] ?></td>
                        <td><?= $consulta['DATA_CONSULTA'] ?></td>
                        <td><?= $consulta['HORA_CONSULTA'] ?></td>
                        <td><?= $consulta['PACIENTE_ID'] ?></td>
                        <td><?= $consulta['PACIENTE_NOME'] ?></td>
                        <td><?= $consulta['MEDICO_NOME'] ?></td>
                        <td><?= $consulta['MEDICO_ESPECIALIDADE'] ?></td>

                        <td><a href="./visualiza_consulta.php?id=<?= $consulta['ID_CON']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    <?php else: ?>
        <p>Nenhuma consulta cadastrada</p>
    <?php endif?>

</body>
</html>