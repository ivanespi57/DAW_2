<?php
    session_start();

    $zona_anterior = isset($_COOKIE["zona_anterior"]) ? $_COOKIE["zona_anterior"] : "No hay datos";
    $hora_anterior = isset($_COOKIE["hora_anterior"]) ? $_COOKIE["hora_anterior"] : "No hay datos";

    $zonas = [
        "Europe/Madrid",
        "Europe/London",
        "America/New_York",
        "America/Los_Angeles",
        "Asia/Tokyo"
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $zona = $_POST["zona"];

        $_SESSION["zona_actual"] = $zona;

        date_default_timezone_set($zona);
        $_SESSION["hora_actual"] = date("H:i:s");

        setcookie("zona_anterior", $zona, time() + 3600);
        setcookie("hora_anterior", $_SESSION["hora_actual"], time() + 3600);

        echo "<h3>Resultado actual (Sesión):</h3>";
        echo "<p><strong>Zona horaria actual:</strong> $zona</p>";
        echo "<p><strong>Hora actual:</strong> " . $_SESSION["hora_actual"] . "</p>";

        echo "<h3>Datos de la ejecución anterior (Cookies):</h3>";
        echo "<p><strong>Zona horaria anterior:</strong> $zona_anterior</p>";
        echo "<p><strong>Hora anterior:</strong> $hora_anterior</p>";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 8 - Iván Espí Asins</title>
    </head>
    <body><
        <h1>Iván Espí Asins</h1>
        <hr>
        <h2>Ejercicio 8</h2>

        <form method="post">
            <label>Selecciona zona horaria:</label>
            <select name="zona" required>
                <?php
                    foreach ($zonas as $z) {
                        echo "<option value='$z'>$z</option>";
                    }
                ?>
            </select>
            <br><br>
            <input type="submit" value="Mostrar hora">
        </form>
    </body>
</html>
