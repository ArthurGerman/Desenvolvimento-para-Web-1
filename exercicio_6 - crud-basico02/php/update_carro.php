<?php
    require_once 'config.php';
    require_once 'autenticate.php';

    $id = $_GET['id'];
        
    $query = $pdo->prepare("SELECT * FROM CARROS WHERE CAR_ID = ?");
    $query->execute([$id]);

    $carro = $query->fetch(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];

        $query = $pdo->prepare("UPDATE CARROS SET CAR_PLACA = ?, CAR_MARCA = ?, CAR_MODELO = ?, CAR_ANO = ? WHERE CAR_ID = ?");

        $query->execute([$placa, $marca, $modelo, $ano, $id]);

        header("Location: ./visualiza_carro.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de dados do veículo</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <h2>
        Informações do veículo
    </h2>
    
    <ul>
        <li>
            <a href="./visualiza_carro.php?id=<?= $id?>">Voltar</a>
        </li>
    </ul>
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label for="placa">Placa: </label>
                </td>    
            </tr>
            <tr>
                <td>
                    <input type="text" name="placa" id="placa" maxlength="7" value="<?= $carro['CAR_PLACA']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="marca">Marca: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="marca" id="marca" value="<?= $carro['CAR_MARCA']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="modelo">Modelo: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="modelo" id="modelo" value="<?= $carro['CAR_MODELO']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="ano">Ano de fabricação/modelo: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="ano" id="ano" maxlength="4" value="<?= $carro['CAR_ANO']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Alterar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>