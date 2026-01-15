<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("DELETE FROM PACIENTE WHERE ID = ?");
    $query->execute([$id]);
    $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/global.css">
    <title>Exclusão de paciente</title>
</head>
<body>

    <p>Paciente excluído com sucesso !</p><br>

    <button>
        <a href='./lista_paciente.php'>Voltar</a>
    </button>
</body>
</html>