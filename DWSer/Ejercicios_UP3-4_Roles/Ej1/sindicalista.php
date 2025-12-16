<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Sindicalista') {
        header("Location: index.php");
        exit;
    }

    function salarioMed($s) { 
        return array_sum($s) / count($s); 
    }

    $salarios = $_SESSION['salarios'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>

    <h1>Perfil Sindicalista</h1>
    <hr>

    <p><strong>Salario medio:</strong> <?= salarioMed($salarios) ?> €</p>

    <br>
    <a href="logout.php">Cerrar sesión</a>

    </body>
</html>
