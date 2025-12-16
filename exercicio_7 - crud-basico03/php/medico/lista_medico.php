<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $query= $pdo->prepare("SELECT * FROM MEDICO");
    $query->execute();
    $medicos = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Listagem de médicos</title>
</head>
<body>
    <header>
        <h1>
            Listagem de médicos
        </h1>

        <a href="../../index.php">Home</a><br><br>
    </header>


    <?php if (!empty($medicos)): ?>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($medicos as $medico): ?>
                    <tr>
                        <td><?= $medico['ID'] ?></td>
                        <td><?= $medico['NOME'] ?></td>
                        <td><?= $medico['ESPECIALIDADE'] ?></td>
    
                        <td><a href="./visualiza_medico.php?id=<?= $medico['ID']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <p>Nenhum médico cadastrados</p>
    <?php endif?>

</body>
</html>