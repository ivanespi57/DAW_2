<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado formulario</title>
</head>

<body>

    <h2>Iván Espí Asins – DAW2</h2>
    <hr>

    <h3 style="color:green">Formulario procesado correctamente</h3>

    <p>Nombre: <?= $_GET["nom"] ?></p>
    <p>Contraseña: <?= $_GET["pass"] ?></p>
    <p>Estudios: <?= $_GET["est"] ?></p>
    <p>Nacionalidad: <?= $_GET["nac"] ?></p>
    <p>Idiomas: <?= $_GET["idi"] ?></p>
    <p>Email: <?= $_GET["email"] ?></p>

    <p>Foto subida:</p>
    <img src="<?= $_GET["foto"] ?>" width="150">

    <br><br>

    <form action="index.php">
        <button type="submit">Volver</button>
    </form>

</body>
</html>
