<?php

    $correcta = "1234";

    $intentos = isset($_COOKIE["intentos"]) ? $_COOKIE["intentos"] : 0;
    $anteriores = isset($_COOKIE["anteriores"]) ? unserialize($_COOKIE["anteriores"]) : [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $clave = $_POST["clave"];

        $anteriores[] = $clave;

        $intentos++;

        setcookie("intentos", $intentos, time() + 3600);
        setcookie("anteriores", serialize($anteriores), time() + 3600);

        echo "<h3>Resultado actual:</h3>";
        if ($clave == $correcta) {
            echo "<p><strong Contraseña correcta. Caja fuerte abierta.</strong></p>";
        } else {
            echo "<p><strong>Contraseña incorrecta.</strong></p>";
        }

        echo "<p>Contraseña introducida: $clave</p>";

        echo "<h3>Datos almacenados (Cookies):</h3>";
        echo "<p><strong>Contraseña correcta:</strong> $correcta</p>";
        echo "<p><strong>Número de intentos:</strong> $intentos</p>";

        echo "<p><strong>Contraseñas ya introducidas:</strong></p>";
        echo "<ul>";
        foreach ($anteriores as $c) {
            echo "<li>$c</li>";
        }
        echo "</ul>";
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
    <hr>
    <h2>Ejercicio 7</h2>

    <form method="post">
        <label>Introduce la contraseña:</label>
        <input type="password" name="clave" required>
        <br><br>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
