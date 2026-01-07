<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Sindicalista') {
        header("Location: index.php");
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
    <title>Sindicalista</title>
</head>
<body>

    <h1>Perfil Sindicalista</h1>
    <hr>

    <p>Salario medio: <?php echo salarioMed($salarios); ?> €</p>

    <a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>

</body>
</html>
