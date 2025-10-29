<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <h2>Ejercicio 8</h2>

    <form method="post" action="Ej8.php">
        <label>Correo electrónico:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Confirma tu correo:</label><br>
        <input type="email" name="confirmar" required><br><br>

        <label>
            <input type="checkbox" name="publicidad"> Acepto recibir publicidad
        </label><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>

</body>
</html>
