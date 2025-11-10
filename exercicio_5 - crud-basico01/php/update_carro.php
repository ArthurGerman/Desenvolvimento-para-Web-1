<?php
    require_once 'config.php';

    $id = $_GET['id'];
        
    $query = $pdo->prepare("SELECT * FROM CARRO WHERE id = ?");
    $query->execute([$id]);

    $carro = $query->fetch(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];

        $query = $pdo->prepare("UPDATE carro SET placa = ?, marca = ?, modelo = ?, ano = ? WHERE id = ?");

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
                    <input type="text" name="placa" id="placa" maxlength="7" value="<?= $carro['placa']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="marca">Marca: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="marca" id="marca" value="<?= $carro['marca']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="modelo">Modelo: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="modelo" id="modelo" value="<?= $carro['modelo']?>" required><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="ano">Ano de fabricação/modelo: </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="ano" id="ano" maxlength="4" value="<?= $carro['ano']?>" required><br>
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