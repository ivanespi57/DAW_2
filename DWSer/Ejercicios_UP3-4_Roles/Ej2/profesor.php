    <?php
        session_start();

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Profesor') {
            header("Location: index.php");
            exit;
        }
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Iván Espí Asins</title>
    </head>
    <body>

        <h1>Perfil Profesor</h1>
        <hr>
        <p><strong>Nombre:</strong> <?= $_SESSION['nombre'] ?></p><br>
        <p><strong>Apellido:</strong>  <?= $_SESSION['apellido'] ?></p><br>
        <p><strong>Asignatura:</strong>  <?= $_SESSION['asigna'] ?></p><br>
        <p><strong>Grupo:</strong>  <?= $_SESSION['grupo'] ?></p><br>
        <br>
        <a href="logout.php">Cerrar sesión</a>

    </body>
    </html>
