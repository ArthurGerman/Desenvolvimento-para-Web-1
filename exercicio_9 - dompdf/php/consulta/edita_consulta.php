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
        MEDICO.ID AS MEDICO_ID,
        MEDICO.NOME AS MEDICO_NOME
        FROM CONSULTA

        INNER JOIN PACIENTE ON CONSULTA.ID_PACIENTE = PACIENTE.ID
        INNER JOIN MEDICO ON CONSULTA.ID_MEDICO = MEDICO.ID

        WHERE CONSULTA.ID_CON = ?
    ");

    $query->execute([$id]);
    $consulta = $query->fetch(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM MEDICO");
    $query->execute();
    $medicos = $query->fetchAll(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM PACIENTE");
    $query->execute();
    $pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_paciente = $_POST['id_paciente'];
        $id_medico = $_POST['id_medico'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $observacao = $_POST['observacao'];

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("UPDATE CONSULTA SET ID_PACIENTE = ?, ID_MEDICO = ?, DATA_CONSULTA = ?, HORA_CONSULTA = ?, OBSERVACAO = ? WHERE ID_CON = ?");
        $query->execute([$id_paciente, $id_medico, $data, $hora, $observacao, $id]);
        header("Location: ./visualiza_consulta.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Edição de cadastro</title>
</head>
<body>
    <header>
        <h1>
            Edição de Consulta
        </h1>

        <a href="../../index.php">Home</a>
        <a href="./visualiza_consulta.php?id=<?= $id ?>" style="margin-left: 10px;">Voltar</a><br><br>

    </header>

    <form action="" method="post">

        <label for="id_paciente">Paciente: </label><br>
        <select name="id_paciente" id="id_paciente" required>
            <option value="">Selecione</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['ID'] ?>" <?= $paciente['ID'] == $consulta['PACIENTE_ID'] ? 'selected' : '' ?>>
                    <?= $paciente['NOME'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="id_medico">Médico: </label><br>
        <select name="id_medico" id="id_medico" required>
            <option value="">Selecione</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['ID'] ?>" <?= $medico['ID'] == $consulta['MEDICO_ID'] ? 'selected' : '' ?>>
                    <?= $medico['NOME'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="data">Data: </label><br>
        <input type="date" name="data" id="data" value="<?= $consulta['DATA_CONSULTA'] ?>" required><br>

        <label for="hora">hora: </label><br>
        <input type="time" name="hora" id="hora" value="<?= $consulta['HORA_CONSULTA'] ?>" required><br>

        <label for="observacao">Observacao: </label><br>
        <textarea type="text" name="observacao" id="observacao" class="observacao"><?= $consulta['OBSERVACAO'] ?></textarea><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>