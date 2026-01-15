<?php 
    require_once 'config.php';

    $query= $pdo->prepare("SELECT * FROM carro");
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
                    <td><?= $carro['id'] ?></td>
                    <td><?= $carro['placa'] ?></td>
                    <td><?= $carro['marca'] ?></td>
                    <td><?= $carro['modelo'] ?></td>
                    <td><?= $carro['ano'] ?></td>

                    <td><a href="./visualiza_carro.php?id=<?= $carro['id']?>">Visualizar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>