<?php
    session_start();

    $multiplicandoAnt = isset($_SESSION["multiplicando"]) ? $_SESSION["multiplicando"] : "Ninguno";
    $multiplicadorAnt = isset($_SESSION["multiplicador"]) ? $_SESSION["multiplicador"] : "Ninguno";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $multiplicando = $_POST["multiplicando"];
        $multiplicador = $_POST["multiplicador"];

        $_SESSION["multiplicando"] = $multiplicando;
        $_SESSION["multiplicador"] = $multiplicador;

        echo "<h3>Tabla actual:</h3>";
        echo "<p><strong>Multiplicando:</strong> $multiplicando</p>";
        echo "<p><strong>Multiplicador:</strong> $multiplicador</p>";

        echo "<ul>";
        for ($i = 1; $i <= $multiplicador; $i++) {
            echo "<li>$multiplicando x $i = " . ($multiplicando * $i) . "</li>";
        }
        echo "</ul>";

        echo "<h3>Datos de la ejecución anterior:</h3>";
        echo "<p><strong>Multiplicando anterior:</strong> $multiplicandoAnt</p>";
        echo "<p><strong>Multiplicador anterior:</strong> $multiplicadorAnt</p>";

        if ($multiplicandoAnt !== "Ninguno" && $multiplicadorAnt !== "Ninguno") {
            echo "<h4>Tabla anterior:</h4>";
            echo "<ul>";
            for ($i = 1; $i <= $multiplicadorAnt; $i++) {
                echo "<li>$multiplicandoAnt x $i = " . ($multiplicandoAnt * $i) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay tabla anterior guardada.</p>";
        }
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
        <h2>Ejercicio 6: Tabla de multiplicar con Sesión</h2>

        <form method="post">
            <label>Multiplicando:</label>
            <input type="number" name="multiplicando" required><br><br>

            <label>Multiplicador (hasta dónde llega la tabla):</label>
            <input type="number" name="multiplicador" required><br><br>

            <input type="submit" value="Generar tabla">
        </form>
    </body>
</html>
