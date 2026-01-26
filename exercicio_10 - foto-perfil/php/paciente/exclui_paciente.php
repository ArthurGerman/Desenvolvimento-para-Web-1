<?php 
    require_once '../config.php';
    require_once '../autenticate.php';

    $id = $_GET['id'];

    // Buscar o caminho da imagem associada ao paciente
    $query = $pdo->prepare("
        SELECT IMAGEM.ID AS ID_IMAGEM,
        IMAGEM.PATH AS IMAGEM_PATH
        FROM PACIENTE 
        LEFT JOIN IMAGEM ON PACIENTE.ID_IMAGEM = IMAGEM.ID 
        WHERE PACIENTE.ID = ?
    ");
    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

    if ($paciente && !empty($paciente['IMAGEM_PATH'])) {
        $caminhoImagem = __DIR__ . '/../../storage/' . $paciente['IMAGEM_PATH'];

        // Verificar se o arquivo existe e excluí-lo
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }
    }

    // Excluir o registro da imagem do banco de dados
    if (!empty($paciente['ID_IMAGEM'])) {
        $query = $pdo->prepare("DELETE FROM IMAGEM WHERE ID = ?");
        $query->execute([$paciente['ID_IMAGEM']]);
    }

    $query= $pdo->prepare("DELETE FROM PACIENTE WHERE ID = ?");
    $query->execute([$id]);

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