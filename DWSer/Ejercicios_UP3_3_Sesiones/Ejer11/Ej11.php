<?php
    session_start();

    if (!isset($_SESSION["datos"])) {
        header("Location: index.php");
        exit;
    }

    $datos = $_SESSION["datos"];

    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultado</title>
    </head>
    <body>

    <h2>Resultado</h2>

    <p><strong>Nombre completo:</strong> <?= $datos["nombre"] . " " . $datos["apellido"] ?></p>
    <p><strong>Correo:</strong> <?= $datos["correo"] ?></p>
    <p><strong>Nivel de estudios:</strong> <?= $datos["estudios"] ?></p>
    <p><strong>Situación actual:</strong> <?= implode(", ", $datos["actual"]) ?></p>

    <?php if (!empty($datos["otroHbb"])): ?>
        <p><strong>Otro hobby:</strong> <?= $datos["otroHbb"] ?></p>
    <?php endif; ?>

    <form action="index.php" method="get">
        <button type="submit">Volver</button>
    </form>

    </body>
</html>
