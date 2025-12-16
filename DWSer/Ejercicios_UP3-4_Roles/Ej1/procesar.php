<?php
session_start();

$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['rol'] = $_POST['rol'];
$_SESSION['salarios'] = $_POST['salarios'];

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
exit;
