<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Nominas') {
        header("Location: index.php");
    }

    function salarioMax($s) { return max($s); }
    function salarioMin($s) { return min($s); }

    $salarios = $_SESSION['salarios'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nóminas</title>
</head>
<body>

    <h1>Perfil Responsable de Nóminas</h1>
    <hr>

    <p>Salario máximo: <?php echo salarioMax($salarios); ?> €</p>
    <p>Salario mínimo: <?php echo salarioMin($salarios); ?> €</p>

    <a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>

</body>
</html>
