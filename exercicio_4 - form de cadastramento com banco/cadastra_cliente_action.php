<?php 
    require_once "config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $CPF = $_POST['CPF'];
        $telefone = $_POST['telefone'];
        $data_reserva = $_POST['data_reserva'];

        $query_1 = $pdo->prepare("INSERT INTO cliente (nome, CPF, telefone) VALUES (?,?,?)");
        $query_1->execute([$nome, $CPF, $telefone]);
        
        $id_cliente = $pdo->lastInsertId(); // Comando para resgatar o último id do cliente usado para fazer o primeiro insert. Vamos usar ele para fazer a segunda query abaixo na tabela de reserva

        $query_2 = $pdo->prepare("INSERT INTO reserva (id_cliente, data_reserva) VALUES (?,?)");
        $query_2->execute([$id_cliente, $data_reserva]);

        echo "Olá $nome ! Seu CPF: $CPF e seu telefone: $telefone, foram cadastrados com sucesso e sua reserva é para o dia $data_reserva <br>";
        echo "<button><a href='cadastra_cliente.php'>Voltar</a></button>";
    } else{

    }
?>