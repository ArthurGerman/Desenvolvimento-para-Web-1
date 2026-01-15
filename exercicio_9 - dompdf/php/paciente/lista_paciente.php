<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $query= $pdo->prepare("SELECT * FROM PACIENTE");
    $query->execute();
    $pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Listagem de pacientes</title>
</head>
<body>
    <header>
        <h1>
            Listagem de pacientes
        </h1>

        <a href="../../index.php">Home</a><br><br>
    </header>

    <?php if (!empty($pacientes)): ?>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Tipo sanguíneo</th>
                    <th>Ações</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['ID'] ?></td>
                        <td><?= $paciente['NOME'] ?></td>
                        <td><?= $paciente['DATA_NASCIMENTO'] ?></td>
                        <td><?= $paciente['TIPO_SANGUINEO'] ?></td>
    
                        <td><a href="./visualiza_paciente.php?id=<?= $paciente['ID']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <p>Nenhum paciente cadastrado</p>
    <?php endif?>

</body>
</html>