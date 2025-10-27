<?php 
    require_once 'config.php';

    $id = $_GET['id']; // ID do cliente na tabela de clientes

    //Para que tudo ocorra bem, é necessário excluir primeiro a reserva depois o cliente

    $query_1 = $pdo->prepare("DELETE FROM reserva WHERE id_cliente = ?");
    $query_1->execute([$id]);

    $query_2 = $pdo->prepare("DELETE FROM cliente WHERE id = ?");
    $query_2->execute([$id]);

    echo "Cadastro e reserva excluídos.";
    echo "<button><a href='lista_cliente.php'>Voltar</a></button>";
?>