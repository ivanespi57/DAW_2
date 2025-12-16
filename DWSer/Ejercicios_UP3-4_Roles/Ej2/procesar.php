<?php
session_start();

$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['rol'] = $_POST['rol'];
$_SESSION['salarios'] = $_POST['salarios'];

switch ($_SESSION['rol']) {
    case 'Director':
        header("Location: director.php");
        break;
    case 'Delegado':
        header("Location: delegado.php");
        break;
    case 'Profesor':
        header("Location: profesor.php");
        break;
    case 'Estudiante':
        header("Location: estudiante.php");
        break;
}
exit;
