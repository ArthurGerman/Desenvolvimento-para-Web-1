<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("
        SELECT PACIENTE.ID,
            PACIENTE.NOME,
            PACIENTE.DATA_NASCIMENTO,
            PACIENTE.TIPO_SANGUINEO,
            IMAGEM.PATH AS IMAGEM

        FROM PACIENTE
        LEFT JOIN IMAGEM ON PACIENTE.ID_IMAGEM = IMAGEM.ID
        WHERE PACIENTE.ID = ?
    ");
    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de paciente</title>
    <link rel="stylesheet" href="../../css/global.css">
</head>
<body>
    <header>
        <h1>
            Visualização de paciente
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./lista_paciente.php" style="margin-left: 10px;">Voltar</a><br><br>
    </header>


    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>
                <th>Foto do paciente</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $paciente['ID'] ?></td>
                <td><?= $paciente['NOME'] ?></td>
                <td><?= $paciente['DATA_NASCIMENTO'] ?></td>
                <td><?= $paciente['TIPO_SANGUINEO'] ?></td>
                <td>
                    <?php if (!empty($paciente['IMAGEM'])): ?>
                        <img src="../../storage/<?= $paciente['IMAGEM'] ?>" alt="Foto do Paciente" width="200">
                    <?php else: ?>
                        <img src="../../storage/profile.jpg" alt="Sem Foto" width="100">
                    <?php endif; ?>
                </td>

                <td><a href="./edita_paciente.php?id=<?= $paciente['ID']?>">Editar</a></td>
                <td><a href="./exclui_paciente.php?id=<?= $paciente['ID']?>">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>