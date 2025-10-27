<?php 
    require_once 'config.php';

    echo "<button><a href='cadastra_cliente.php'>Voltar</a></button><br>";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {


        //Query sql com o select usado para mostrar todos os dados do cliente na tabela de clientes e também fazendo a junção com a tabela de reserva para selecionar a data da reserva, já que a data está em outra tabela.
        $query= $pdo->query("
            SELECT cliente.id, cliente.nome, cliente.CPF, cliente.telefone, reserva.data_reserva 
            FROM cliente 
            LEFT JOIN reserva ON cliente.id = reserva.id_cliente
        ");

        $cliente = $query->fetchAll(PDO::FETCH_ASSOC);



        foreach ($cliente as $cliente){
            echo "<strong>ID: </strong>".  $cliente['id'] . 
                " | <strong>Nome: </strong>" . $cliente['nome'] . 
                " | <strong>CPF: </strong>" . $cliente['CPF'] . 
                " | <strong>Telefone: </strong>" . $cliente['telefone'] . 
                " | <strong>Data da reserva: </strong>" . $cliente["data_reserva"] . 

                "<button><a href='exclui_cliente.php?id=".$cliente['id']."'>Exluir</a></button>" . 
                "<button><a href='altera_cliente.php?id=". $cliente['id'] ."'>Alterar</a></button><br>";
        }

    }
?>