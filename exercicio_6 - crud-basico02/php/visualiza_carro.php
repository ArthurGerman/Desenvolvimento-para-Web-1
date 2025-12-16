<?php 
    require_once 'config.php';
    require_once 'autenticate.php';

    $id = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM CARROS WHERE CAR_ID = ?");
    $query->execute([$id]);
    $carro = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do veículo</title>
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
                    <td><?= $carro['CAR_PLACA']?></td>
                    <td><?= $carro['CAR_MARCA']?></td>
                    <td><?= $carro['CAR_MODELO']?></td>
                    <td><?= $carro['CAR_ANO']?></td>
                    <td><a href="./update_carro.php?id=<?= $carro['CAR_ID']?>">Editar</a></td>
                    <td><a href="./exclui_carro.php?id=<?=$carro['CAR_ID']?>">Excluir</a></td>
                </tr>
            <?php else: ?>
                <p style="color:red">Carro não encontrado</p>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>