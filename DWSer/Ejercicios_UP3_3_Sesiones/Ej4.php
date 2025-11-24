<?php
    session_start();

    $diaAnterior = isset($_SESSION["dia"]) ? $_SESSION["dia"] : "Ninguno";
    $quincenaAnterior = isset($_SESSION["quincena"]) ? $_SESSION["quincena"] : "Ninguna";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dia = $_POST["dia"];
        $quincena = "";

        if ($dia <= 0 || $dia > 31) {
            $quincena = "Has introducido un día inválido";
        } else {
            if ($dia > 15) {
                $quincena = "Segunda quincena";
            } else {
                $quincena = "Primera quincena";
            }
        }

        $_SESSION["dia"] = $dia;
        $_SESSION["quincena"] = $quincena;

        echo "<h3>Resultados actuales:</h3>";
        echo "<p><strong>Día:</strong> $dia</p>";
        echo "<p><strong>Quincena:</strong> $quincena</p>";

        echo "<h3>Valores anteriores:</h3>";
        echo "<p><strong>Día anterior:</strong> $diaAnterior</p>";
        echo "<p><strong>Quincena anterior:</strong> $quincenaAnterior</p>";
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
        <h2>Ejercicio 4: Día y Quincena con Sesión</h2>

        <form method="post">
            <label>Introduce el día del mes (1-31):</label><br>
            <input type="number" name="dia" id="dia" required><br><br>

            <input type="submit" value="Calcular">
        </form>

    </body>
</html>
