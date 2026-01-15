<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: /php/administrador/login_administrador.php');
        exit();
    }
?>
