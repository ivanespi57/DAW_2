<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Gerente') {
        header("Location: index.php");
    }

    function salarioMax($s) { return max($s); }
    function salarioMin($s) { return min($s); }
    function salarioMed($s) { return array_sum($s) / count($s); }

    $salarios = $_SESSION['salarios'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gerente</title>
</head>
<body>

    <h1>Perfil Gerente</h1>
    <hr>

    <p>Salario máximo: <?php echo salarioMax($salarios); ?> €</p>
    <p>Salario mínimo: <?php echo salarioMin($salarios); ?> €</p>
    <p>Salario medio: <?php echo salarioMed($salarios); ?> €</p>

    <a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>

</body>
</html>
