<?php

    $numAnt = isset($_COOKIE["numeros"]) ? $_COOKIE["numeros"] : 0;
    $calAnt = isset($_COOKIE["calculos"]) ? $_COOKIE["calculos"] : 0;
    $resAnt = isset($_COOKIE["res"]) ? $_COOKIE["res"] : 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $num = $_POST["numeros"];

        
        setcookie("numeros", $numeros, time() + 3600);
        setcookie("anteriores", $anteriores, time() + 3600);

        echo "<h3>Resultado actual:</h3>";
        if ($clave == $correcta) {
            echo "<p><strong </strong></p>";
        } else {
            echo "<p><strong> </strong></p>";
        }

        echo "<p>Contraseña introducida: $clave</p>";

        echo "<h3>Datos almacenados (Cookies):</h3>";
        echo "<p><strong></strong> </p>";
        echo "<p><strong></strong> </p>";

        echo "<p><strong>:</strong></p>";
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
    <h2>Ejercicio 8 - Calcular media, mediana y moda</h2>

    <form method="post">
        <label>Introduce números:</label>
        <input type="text" name="numeros" required>
        <br><br>
        <label>Calcular:</label><br>
        <input type="checkbox" name="calcu[]" value="media">Media<br>
        <input type="checkbox" name="calcu[]" value="mediana">Mediana<br>
        <input type="checkbox" name="calcu[]" value="moda">Moda<br>
        <input type="chackbox" name="calcu[]" value="todos">Todos<br><br>

        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
