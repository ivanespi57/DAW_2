<?php
    session_start();

    if (isset($_GET['token']) && hash_equals($_SESSION['token'], $_GET['token'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    } else {
        print("Token inválido al cerrar sesión");
    }
?>
