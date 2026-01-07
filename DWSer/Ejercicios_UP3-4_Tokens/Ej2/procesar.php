<?php
    session_start();

    if (!isset($_POST['token'])) {
        print("No se ha encontrado token");
    } elseif (!hash_equals($_SESSION['token'], $_POST['token'])) {
        print("El token no coincide. Petición rechazada.");
    } else {

        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['apellido'] = $_POST['apellido'];
        $_SESSION['asigna'] = $_POST['asigna'];
        $_SESSION['grupo'] = $_POST['grupo'];
        $_SESSION['edad'] = $_POST['edad'];
        $_SESSION['cargo'] = $_POST['cargo'];

        unset($_SESSION['token']);

        if ($_SESSION['edad'] == "mayor" && $_SESSION['cargo'] == "con") {
            $_SESSION['rol'] = "Director";
            header("Location: director.php");
        } elseif ($_SESSION['edad'] == "mayor" && $_SESSION['cargo'] == "sin") {
            $_SESSION['rol'] = "Profesor";
            header("Location: profesor.php");
        } elseif ($_SESSION['edad'] == "menor" && $_SESSION['cargo'] == "con") {
            $_SESSION['rol'] = "Delegado";
            header("Location: delegado.php");
        } else {
            $_SESSION['rol'] = "Estudiante";
            header("Location: estudiante.php");
        }
    }
?>
