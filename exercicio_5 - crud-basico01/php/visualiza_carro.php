<?php 
    require_once 'config.php';

    $id = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM carro WHERE id = ?");
    $query->execute([$id]);
    $carro = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dados do veículo</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <h2>
        Informações do veículo
    </h2>
    
    <ul>
        <li>
            <a href="./lista_carros.php">Voltar</a>
        </li>
    </ul>
    
    <table border="2">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($carro): ?>
                <tr>
                    <td><?= $carro['placa']?></td>
                    <td><?= $carro['marca']?></td>
                    <td><?= $carro['modelo']?></td>
                    <td><?= $carro['ano']?></td>
                    <td><a href="./update_carro.php?id=<?= $carro['id']?>">Editar</a></td>
                    <td><a href="./exclui_carro.php?id=<?=$carro['id']?>">Excluir</a></td>
                </tr>
            <?php else: ?>
                <p style="color:red">Carro não encontrado</p>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>