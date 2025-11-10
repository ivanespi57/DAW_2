<?php
    $usuarioAnterior = isset($_COOKIE["nombre"]) ? $_COOKIE["nombre"] : "Ninguno";
    $idiomaAnterior  = isset($_COOKIE["idioma"]) ? $_COOKIE["idioma"] : "Ninguno";
    $colorAnterior   = isset($_COOKIE["color"]) ? $_COOKIE["color"] : "Ninguno";
    $ciudadAnterior  = isset($_COOKIE["ciudad"]) ? $_COOKIE["ciudad"] : "Ninguna";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $idioma = $_POST["idioma"];
        $color = $_POST["color"];
        $ciudad = $_POST["ciudad"];

        setcookie("nombre", $nombre, time() + 3600);
        setcookie("idioma", $idioma, time() + 3600);
        setcookie("color", $color, time() + 3600);
        setcookie("ciudad", $ciudad, time() + 3600);

        echo "<h3>Resultados actuales:</h3>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Preferencia de idioma:</strong> $idioma</p>";
        echo "<p><strong>Color:</strong><span style='color:{$color}'>$color</p>";
        echo "<p><strong>Ciudad:</strong> $ciudad</p>";
        echo "<h3>Resultados anteriores:</h3>";
        echo "<p><strong>Nombre anterior:</strong> $usuarioAnterior</p>";
        echo "<p><strong>Idioma anterior:</strong> $idiomaAnterior</p>";
        echo "<p><strong>Color anterior:</strong><span style='color:{$colorAnterior}'>{$colorAnterior}</p>";
        echo "<p><strong>Ciudad anterior:</strong> $ciudadAnterior</p>";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <h2>Ejercicio 2</h2>

    <form method="post">
        <label for="nombre">Introduce tu nombre:</label><br>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label>Preferencia de idioma:</label><br>
        <select name="idioma" id="idioma">
            <option value="Español">Español</option>
            <option value="Inglés">Inglés</option>
            <option value="Francés">Francés</option>
            <option value="Italiano">Italiano</option>
        </select><br><br>

        <label>Color:</label><br>
        <input type="color" name="color"><br><br>

        <label>Ciudad:</label><br>
        <input type="radio" name="ciudad" value="valencia">Valencia<br>
        <input type="radio" name="ciudad" value="castellon">Castellón<br>
        <input type="radio" name="ciudad" value="teruel">Teruel<br>
        <input type="radio" name="ciudad" value="alicante">Alicante<br><br>


        <input type="submit" value="Enviar">
    </form>

</body>
</html>
