<?php
    include "config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $data = $_POST['data_nascimento'];
        //$resultado = $peso / ($altura**2); // Resultado
        echo "Seu nome é $nome e sua idade é $data"; 

    }else {

    }
?>