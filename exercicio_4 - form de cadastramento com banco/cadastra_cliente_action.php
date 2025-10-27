<?php 
    require_once "config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $CPF = $_POST['CPF'];
        $telefone = $_POST['telefone'];
        $data_reserva = $_POST['data_reserva'];

        $stmt = $pdo->prepare("INSERT INTO cliente (nome, CPF, telefone) VALUES (?,?,?)");
        $stmt->execute([$nome, $CPF, $telefone]);
        
        $id_cliente = $pdo->lastInsertId();

        $stmt2 = $pdo->prepare("INSERT INTO reserva (id_cliente, data_reserva) VALUES (?,?)");
        $stmt2->execute([$id_cliente, $data_reserva]);

        echo "Olá $nome ! Seu CPF: $CPF e seu telefone: $telefone, foram cadastrados com sucesso e sua reserva é para o dia $data_reserva <br>";
        echo "<button><a href='cadastra_cliente.php'>Voltar</a></button>";
    } else{

    }
?>