<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Comprobar tipo de carácter (con funciones ctype)</h2>

    <form method="post">
        <label>Introduce un carácter:</label>
        <input type="text" name="caracter" maxlength="1" required><br><br>
        <input type="submit" value="Comprobar">
    </form>

    <?php
        if ($_POST) {
            $car = $_POST['caracter'];

            echo "<hr>";
            echo "<p>El carácter introducido es: <strong>$car</strong></p>";

            if (ctype_upper($car)) {
                echo "<p>Es una letra <strong>mayúscula</strong>.</p>";
            } elseif (ctype_lower($car)) {
                echo "<p>Es una letra <strong>minúscula</strong>.</p>";
            } elseif (ctype_digit($car)) {
                echo "<p>Es un carácter <strong>numérico</strong>.</p>";
            } elseif (ctype_space($car)) {
                echo "<p>Es un carácter <strong>en blanco</strong>.</p>";
            } elseif (ctype_punct($car)) {
                echo "<p>Es un carácter <strong>de puntuación</strong>.</p>";
            } else {
                echo "<p>Es un carácter <strong>especial o no imprimible</strong>.</p>";
            }
        }
    ?>
</body>
</html>