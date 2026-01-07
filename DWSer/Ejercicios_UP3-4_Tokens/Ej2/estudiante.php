<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Estudiante') {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiante</title>
</head>
<body>

    <h1>Perfil Estudiante</h1>
    <hr>

    <p><strong>Nombre:</strong> <?php echo $_SESSION['nombre']; ?></p>
    <p><strong>Apellido:</strong> <?php echo $_SESSION['apellido']; ?></p>
    <p><strong>Asignatura:</strong> <?php echo $_SESSION['asigna']; ?></p>
    <p><strong>Grupo:</strong> <?php echo $_SESSION['grupo']; ?></p>

    <a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>

</body>
</html>
