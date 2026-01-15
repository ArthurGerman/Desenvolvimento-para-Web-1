<?php 
    require_once 'config.php';
    require_once 'autenticate.php';

    $id = $_GET['id'];

    $query = $pdo->prepare("DELETE FROM CARROS WHERE CAR_ID = ?");
    $query->execute([$id]);

    header('Location: ./lista_carros.php')

?>