<?php

    $num1Anterior = isset($_COOKIE["num1"]) ? $_COOKIE["num1"] : "Ninguno";
    $num2Anterior = isset($_COOKIE["num2"]) ? $_COOKIE["num2"] : "Ninguno";
    $operacionAnterior = isset($_COOKIE["operacion"]) ? $_COOKIE["operacion"] : "Ninguna";
    $resultadoAnterior = isset($_COOKIE["resultado"]) ? $_COOKIE["resultado"] : "Ninguno";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operacion = $_POST["operacion"];

        $resultado = "";

        switch ($operacion) {
            case "suma":
                $resultado = $num1 + $num2;
                break;
            case "resta":
                $resultado = $num1 - $num2;
                break;
            case "multiplicacion":
                $resultado = $num1 * $num2;
                break;
            case "division":
                $resultado = ($num2 != 0) ? $num1 / $num2 : "Error: No se puede dividir entre 0";
                break;
            default:
                $resultado = "Operación no válida";
        }

        setcookie("num1", $num1, time() + 3600);
        setcookie("num2", $num2, time() + 3600);
        setcookie("operacion", $operacion, time() + 3600);
        setcookie("resultado", $resultado, time() + 3600);

        echo "<h3>Resultados actuales:</h3>";
        echo "<p><strong>Número 1:</strong> $num1</p>";
        echo "<p><strong>Número 2:</strong> $num2</p>";
        echo "<p><strong>Operación elegida:</strong> $operacion</p>";
        echo "<p><strong>Resultado:</strong> $resultado</p>";

        echo "<h3>Valores anteriores:</h3>";
        echo "<p><strong>Número 1 anterior:</strong> $num1Anterior</p>";
        echo "<p><strong>Número 2 anterior:</strong> $num2Anterior</p>";
        echo "<p><strong>Operación anterior:</strong> $operacionAnterior</p>";
        echo "<p><strong>Resultado anterior:</strong> $resultadoAnterior</p>";
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
    <h2>Ejercicio: Calculadora con Cookies</h2>

    <form method="post">
        <label>Introduce el primer número:</label><br>
        <input type="number" name="num1" id="num1" required><br><br>

        <label>Introduce el segundo número:</label><br>
        <input type="number" name="num2" id="num2" required><br><br>

        <label >Selecciona una operación:</label><br>
        <select name="operacion" id="operacion" required>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form>

</body>
</html>
