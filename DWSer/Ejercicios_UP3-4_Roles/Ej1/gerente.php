<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Gerente') {
        header("Location: index.php");
        exit;
    }

    function salarioMax($s) { 
        return max($s); 
    }
    function salarioMin($s) { 
        return min($s); 
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

    <h1>Perfil Gerente</h1>
    <hr>

    <p><strong>Salario máximo:</strong> <?= salarioMax($salarios) ?> €</p>
    <p><strong>Salario mínimo:</strong> <?= salarioMin($salarios) ?> €</p>
    <p><strong>Salario medio:</strong> <?= salarioMed($salarios) ?> €</p>

    <br>
    <a href="logout.php">Cerrar sesión</a>

</body>
</html>

