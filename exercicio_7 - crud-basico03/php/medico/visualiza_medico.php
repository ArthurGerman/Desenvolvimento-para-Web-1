<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM MEDICO WHERE ID = ?");
    $query->execute([$id]);
    $medico = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de médico</title>
    <link rel="stylesheet" href="../../css/global.css">
</head>
<body>
    <header>
        <h1>
            Visualização de médico
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./lista_medico.php" style="margin-left: 10px;">Voltar</a><br><br>
    </header>


    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $medico['ID'] ?></td>
                <td><?= $medico['NOME'] ?></td>
                <td><?= $medico['ESPECIALIDADE'] ?></td>

                <td><a href="./edita_medico.php?id=<?= $medico['ID']?>">Editar</a></td>
                <td><a href="./exclui_medico.php?id=">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>