<?php
    session_start();

    if (!isset($_POST['token'])) {
        print("No se ha encontrado token");
    } elseif (!hash_equals($_SESSION['token'], $_POST['token'])) {
        print("El token no coincide. Petición rechazada.");
    } else {

        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['rol'] = $_POST['rol'];
        $_SESSION['salarios'] = $_POST['salarios'];

        unset($_SESSION['token']);

        switch ($_SESSION['rol']) {
            case 'Gerente':
                header("Location: gerente.php");
                break;
            case 'Sindicalista':
                header("Location: sindicalista.php");
                break;
            case 'Nominas':
                header("Location: nominas.php");
                break;
        }
    }
?>
