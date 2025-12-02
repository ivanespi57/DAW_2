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
        <title>Iván Espí Asins</title>
    </head>
    <body>
    
    <h2>Resultado</h2>

    <p><strong>Nombre completo:</strong> <?= $datos["nombre"] . " " . $datos["apellidos"] ?></p>
    <p><strong>Edad:</strong> <?= $datos["edad"] ?></p>
    <p><strong>Peso:</strong> <?= $datos["peso"] ?> kg</p>
    <p><strong>Sexo:</strong> <?= $datos["sexo"] ?></p>
    <p><strong>Estado civil:</strong> 
        <?= $datos["civil"] ?>
        <?php if ($datos["civil"] == "Otros" && !empty($datos["otroEst"])): ?>
            (<?= $datos["otroEst"] ?>)
        <?php endif; ?>
    </p>

    <p><strong>Aficiones:</strong> <?= implode(", ", $datos["aficio"]) ?></p>

    <form action="index.php" method="get">
        <button type="submit">Volver</button>
    </form>

    </body>
</html>
