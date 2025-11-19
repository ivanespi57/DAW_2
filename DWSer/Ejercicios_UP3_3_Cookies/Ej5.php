<?php
        $importeAnterior = isset($_COOKIE["importe"]) ? $_COOKIE["importe"] : "Ninguno";
        $tipoAnterior = isset($_COOKIE["tipo"]) ? $_COOKIE["tipo"] : "Ninguno";
        $resultadoAnterior = isset($_COOKIE["resultado"]) ? $_COOKIE["resultado"] : "Ninguno";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $importe = $_POST['importe'];
            $tipo = $_POST['convertir'];
            $cambio = 166.386;
            $resultado = "";

            if ($tipo == "eurpes") {
                $resultado = $importe * $cambio;
                echo "<h3>Resultado actual:</h3>";
                echo "<p>$importe € son " . number_format($resultado, 2) . " pesetas</p>";
            } elseif ($tipo == "peseur") {
                $resultado = $importe / $cambio;
                echo "<h3>Resultado actual:</h3>";
                echo "<p>$importe pesetas son " . number_format($resultado, 2) . " euros</p>";
            }

            setcookie("importe", $importe, time() + 3600);
            setcookie("tipo", $tipo, time() + 3600);
            setcookie("resultado", $resultado, time() + 3600);

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
    <h2>Ejerciio 5</h2>

    <form method="post">
        <label>Importe:</label>
        <input type="number" name="importe" required><br><br>

        <input type="radio" name="convertir" value="eurpes" required> Euros a Pesetas<br>
        <input type="radio" name="convertir" value="peseur" required> Pesetas a Euros<br><br>

        <input type="submit" value="Convertir">
    </form>
</body>
</html>
