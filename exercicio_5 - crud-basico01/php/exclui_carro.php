<?php 
    require_once 'config.php';

    $id = $_GET['id'];

    $query = $pdo->prepare("DELETE FROM carro WHERE id = ?");
    $query->execute([$id]);

    header('Location: ./lista_carros.php')

?>