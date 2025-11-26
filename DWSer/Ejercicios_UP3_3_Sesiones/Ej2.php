<?php
    session_start();

    $usuarioAnterior = $_COOKIE["nombre"] ?? "Ninguno";
    $idiomaAnterior  = $_COOKIE["idioma"] ?? "Ninguno";
    $colorAnterior   = $_COOKIE["color"] ?? "Ninguno";
    $ciudadAnterior  = $_COOKIE["ciudad"] ?? "Ninguna";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION["nombre"] = trim($_POST["nombre"]);
        $_SESSION["idioma"] = $_POST["idioma"];
        $_SESSION["color"]  = $_POST["color"];
        $_SESSION["ciudad"] = $_POST["ciudad"];

        setcookie("nombre", $_SESSION["nombre"], time() + 3600);
        setcookie("idioma", $_SESSION["idioma"], time() + 3600);
        setcookie("color",  $_SESSION["color"], time() + 3600);
        setcookie("ciudad", $_SESSION["ciudad"], time() + 3600);

        echo "<h3>Resultados actuales (SESION):</h3>";
        echo "<p><strong>Nombre:</strong> {$_SESSION['nombre']}</p>";
        echo "<p><strong>Idioma:</strong> {$_SESSION['idioma']}</p>";
        echo "<p><strong>Color:</strong> <span style='color:{$_SESSION['color']}'>{$_SESSION['color']}</span></p>";
        echo "<p><strong>Ciudad:</strong> {$_SESSION['ciudad']}</p>";

        echo "<h3>Resultados anteriores (COOKIES):</h3>";
        echo "<p><strong>Nombre anterior:</strong> $usuarioAnterior</p>";
        echo "<p><strong>Idioma anterior:</strong> $idiomaAnterior</p>";
        echo "<p><strong>Color anterior:</strong> <span style='color:$colorAnterior'>$colorAnterior</span></p>";
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
    <h2>Ejercicio 2 con Sesión</h2>

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
        <input type="radio" name="ciudad" value="Valencia">Valencia<br>
        <input type="radio" name="ciudad" value="Castellón">Castellón<br>
        <input type="radio" name="ciudad" value="Teruel">Teruel<br>
        <input type="radio" name="ciudad" value="Alicante">Alicante<br><br>

        <input type="submit" value="Enviar">
    </form>

    </body>
</html>
