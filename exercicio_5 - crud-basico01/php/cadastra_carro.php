<?php 
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];

        $query = $pdo->prepare("INSERT INTO carro (placa, marca, modelo, ano) VALUES (?,?,?,?)");

        $query->execute([$placa, $marca, $modelo, $ano]);

        header("Location: lista_carros.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento de veículo</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <header>
        <h1>
            Seja bem-vindo ao nosso serviço de cadastramento e listagem de veículos.
        </h1>

        <ul>
            <li>
                <a href="../index.php">Voltar</a>
            </li>
        </ul>
    </header>

    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label for="placa">Placa: </label>
                </td>
            </tr>
                
            <tr>
                <td>
                    <input type="text" name="placa" id="placa" maxlength="7">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="marca">Marca: </label>
                </td>
            </tr>
            
            <tr>
                <td>            
                    <input type="text" name="marca" id="marca">
                </td>
            </tr>

            <tr>
                <td>                    
                    <label for="modelo">Modelo: </label>
                </td>    
            </tr>

            <tr>
                <td>
                    <input type="text" name="modelo" id="modelo">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="ano">Ano de fabricação/modelo: </label>
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="text" name="ano" id="ano" maxlength="4"><br>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit">
                </td>
            </tr>
        </table>




    </form>
</body>
</html>