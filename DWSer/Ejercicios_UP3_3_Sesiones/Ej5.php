<?php
    session_start();

    $importeAnterior = isset($_SESSION["importe"]) ? $_SESSION["importe"] : "Ninguno";
    $tipoAnterior = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : "Ninguno";
    $resultadoAnterior = isset($_SESSION["resultado"]) ? $_SESSION["resultado"] : "Ninguno";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $importe = $_POST['importe'];
        $tipo = $_POST['convertir'];
        $cambio = 166.386;
        $resultado = "";

        echo "<h3>Resultado actual:</h3>";

        if ($tipo == "eurpes") {
            $resultado = $importe * $cambio;
            echo "<p>$importe € son " . number_format($resultado, 2) . " pesetas</p>";
        } elseif ($tipo == "peseur") {
            $resultado = $importe / $cambio;
            echo "<p>$importe pesetas son " . number_format($resultado, 2) . " euros</p>";
        }

        $_SESSION["importe"] = $importe;
        $_SESSION["tipo"] = $tipo;
        $_SESSION["resultado"] = $resultado;

        echo "<h3>Datos de la ejecución anterior:</h3>";
        echo "<p><strong>Importe anterior:</strong> $importeAnterior</p>";

        if ($tipoAnterior == "eurpes") {
            echo "<p><strong>Tipo anterior:</strong> Euros a Pesetas</p>";
            echo "<p><strong>Conversión anterior:</strong> " . number_format($resultadoAnterior, 2) . " pesetas</p>";
        } elseif ($tipoAnterior == "peseur") {
            echo "<p><strong>Tipo anterior:</strong> Pesetas a Euros</p>";
            echo "<p><strong>Conversión anterior:</strong> " . number_format($resultadoAnterior, 2) . " euros</p>";
        } else {
            echo "<p><strong>Tipo anterior:</strong> Ninguno</p>";
            echo "<p><strong>Conversión anterior:</strong> Ninguna</p>";
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
        <h2>Ejercicio 5 (Sesiones)</h2>

        <form method="post">
            <label>Importe:</label>
            <input type="number" name="importe" required><br><br>

            <input type="radio" name="convertir" value="eurpes" required> Euros a Pesetas<br>
            <input type="radio" name="convertir" value="peseur" required> Pesetas a Euros<br><br>

            <input type="submit" value="Convertir">
        </form>
    </body>
</html>
