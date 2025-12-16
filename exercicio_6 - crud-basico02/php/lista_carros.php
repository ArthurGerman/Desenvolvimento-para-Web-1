<?php 
    require_once 'config.php';
    require_once 'autenticate.php';

    $query= $pdo->prepare("SELECT * FROM CARROS");
    $query->execute();
    $carros = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de veículos</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <header>
        <h1>
            Seja bem-vindo ao nosso serviço de cadastramento e listagem de veículos.
        </h1>

        <ul>
            <li>
                <a href="../index.php">Home</a>
            </li>

            
            <li>
                <a href="./cadastra_carro.php">Cadastrar novo veículo</a>
            </li>
        </ul>
    </header>


    <h2>
        Lista de veículos
    </h2>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano de fabricação</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($carros as $carro): ?>
                <tr>
                    <td><?= $carro['CAR_ID'] ?></td>
                    <td><?= $carro['CAR_PLACA'] ?></td>
                    <td><?= $carro['CAR_MARCA'] ?></td>
                    <td><?= $carro['CAR_MODELO'] ?></td>
                    <td><?= $carro['CAR_ANO'] ?></td>

                    <td><a href="./visualiza_carro.php?id=<?= $carro['CAR_ID']?>">Visualizar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>