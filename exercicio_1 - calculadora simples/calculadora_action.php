<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $A = $_POST['A'];
        $B = $_POST['B'];
        $resultado = $A + $B;

        echo "A soma de $A com $B é $resultado";
    }
?>