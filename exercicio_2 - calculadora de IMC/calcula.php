<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $resultado = $peso / ($altura**2); // Resultado
        echo "Para a altura de $altura e peso $peso, seu IMC é $resultado"; 

    }else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        echo "Não usou método POST";   
    }
?>