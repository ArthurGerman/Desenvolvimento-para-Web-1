<?php 
    require_once 'config.php';

    $id = $_GET['id']; // Id do cliente na tabela de clientes, não na tabela de reservas

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){

        $query_1 = $pdo->prepare("SELECT * FROM cliente WHERE id = ?"); // Seleção dos dados dos clientes por meio do ID na tabela de clientes
        $query_1->execute([$id]);
        $cliente = $query_1->fetch(PDO::FETCH_ASSOC);

        $query_2 = $pdo->prepare("SELECT * FROM reserva WHERE id_cliente = ?"); // Seleção dos dados de reserva dos cliente por meio do ID do cliente como chave estrangeira da tabela "clientes"
        $query_2->execute([$id]);
        $reserva = $query_2->fetch(PDO::FETCH_ASSOC);
        

    }
?>

<html>
    <form method="POST" action="altera_cliente_action.php">
        
        <label for="id">ID: </label>
        <input type="number" name="id" id="id" value="<?php echo $cliente['id'] ?>" readonly><br>

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" value="<?php echo $cliente['nome'];?>"><br>

        <label for="CPF">CPF: </label>
        <input type="text" name="CPF" id="CPF" maxlength="11" value="<?php echo $cliente['CPF'];?>"><br>

        <label for="telefone">Telefone: </label>
        <input type="tel" name="telefone" id="telefone" maxlength="9" value="<?php echo $cliente['telefone'];?>"><br>

        <label for="data_reserva">Data da reserva</label>
        <input type="date" id="data_reserva" name="data_reserva" value="<?php echo $reserva['data_reserva'];?>"><br>

        <button><a href="lista_cliente.php">Voltar</a></button>
        <input type="submit" value="Alterar">
        
    </form>
</html>