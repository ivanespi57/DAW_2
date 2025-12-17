<?php
    session_start();

    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];
    $_SESSION['asigna'] = $_POST['asigna'];
    $_SESSION['grupo'] = $_POST['grupo'];
    $_SESSION['edad'] = $_POST['edad'];
    $_SESSION['cargo'] = $_POST['cargo'];

    if ($_SESSION['edad'] == "mayor" && $_SESSION['cargo'] == "con") {
        $_SESSION['rol'] = "Director";
        header("Location: director.php");
        exit;
    } elseif ($_SESSION['edad'] == "mayor" && $_SESSION['cargo'] == "sin") {
        $_SESSION['rol'] = "Profesor";
        header("Location: profesor.php");
        exit;
    } elseif ($_SESSION['edad'] == "menor" && $_SESSION['cargo'] == "con") {
        $_SESSION['rol'] = "Delegado";
        header("Location: delegado.php");
        exit;
    } else {
        $_SESSION['rol'] = "Estudiante";
        header("Location: estudiante.php");
        exit;
    }

?>