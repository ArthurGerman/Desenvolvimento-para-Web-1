<html>
    <h1>
        Atividade CRUD 1 - Arthur Germano da Cunha Silva 
    </h1>
    <p>
        Resolvi fazer um CRUD para cadastramento de clientes e escolha de datas para reservas em um restaurante usando duas tabelas no banco de dados. <br> Para essa atividade foi usado o github copilot com motor de IA ChatGPT 4o integrado ao vscode para consultas de coisas que eu não sabia fazer, como por exemplo: fazer um select juntando dados de duas tabelas. 
    </p>
    <form method="POST" action="cadastra_cliente_action.php">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"><br>

        <label for="CPF">CPF: </label>
        <input type="text" name="CPF" id="CPF" maxlength="11"><br>

        <label for="telefone">Telefone: </label>
        <input type="tel" name="telefone" id="telefone" maxlength="9"><br>

        <label for="data_reserva">Data da reserva</label>
        <input type="date" id="data_reserva" name="data_reserva"><br>

        <input type="submit">
        
    </form>

    <button><a href="lista_cliente.php">Listar clientes</a></button>
</html>