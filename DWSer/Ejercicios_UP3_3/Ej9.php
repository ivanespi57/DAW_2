<?php

    $zonaAnt = isset($_COOKIE["zona"]) ? $_COOKIE["zona"] : "Ninguna";
    $horaAnt = isset($_COOKIE["hora"]) ? $_COOKIE["hora"] : "Ninguna";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $zona = $_POST["zona"];
        date_default_timezone_set($zona);

        $horaActual = date("H:i:s");

        setcookie("zona", $zona, time() + 3600);
        setcookie("hora", $horaActual, time() + 3600);

        echo "<h3>Hora actual:</h3>";
        echo "<p><strong>Zona horaria:</strong> $zona</p>";
        echo "<p><strong>Hora:</strong> $horaActual</p>";

        echo "<hr>";
        echo "<h3>Datos de la ejecución anterior:</h3>";
        echo "<p><strong>Zona anterior:</strong> $zonaAnt</p>";
        echo "<p><strong>Hora anterior:</strong> $horaAnt</p>";
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
    <h2>Ejercicio 9</h2>

    <form method="post">
    <label>Selecciona una zona horaria:</label><br><br>

    <select name="zona" required>
        <option value="Europe/Madrid">Europe/Madrid</option>
        <option value="Europe/London">Europe/London</option>
        <option value="America/New_York">America/New_York</option>
        <option value="America/Los_Angeles">America/Los_Angeles</option>
        <option value="America/Mexico_City">America/Mexico_City</option>
        <option value="Asia/Tokyo">Asia/Tokyo</option>
        <option value="Asia/Shanghai">Asia/Shanghai</option>
        <option value="Australia/Sydney">Australia/Sydney</option>
    </select>

    <br><br>
    <input type="submit" value="Mostrar hora">
</form>

</body>
</html>
