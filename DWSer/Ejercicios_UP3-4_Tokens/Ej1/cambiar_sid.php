<?php
    session_start();

    session_regenerate_id(true);

    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));

    header("Location: index.php");
?>