<?php 
    require_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id']; //ID do cliente na tabela de clientes
        $nome = $_POST['nome'];
        $CPF = $_POST['CPF'];
        $telefone = $_POST['telefone'];
        $data_reserva = $_POST['data_reserva'];

        $query_1 = $pdo->prepare("UPDATE cliente SET nome = ?, CPF = ?, telefone = ? WHERE id = ?"); // Primeira query para atualizar os dados do cliente na tabela "cliente"
        $query_1->execute([$nome, $CPF, $telefone, $id]);

        $query_2 = $pdo->prepare("UPDATE reserva SET data_reserva = ? WHERE id_cliente = ?"); // Segunda query para atualizar a data da reserva na tabela "reserva" utilizando o id do cliente como chave estrangeira
        $query_2->execute([$data_reserva, $id]);


        echo "Dados alterados com sucesso";
    }


    echo "<button><a href='lista_cliente.php'>Voltar</a></button>"
?>