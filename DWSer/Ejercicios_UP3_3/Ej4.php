<?php

    $diaAnterior = isset($_COOKIE["dia"]) ? $_COOKIE["dia"] : "Ninguno";
    $resultadoAnterior = isset($_COOKIE["resultado"]) ? $_COOKIE["resultado"] : "Ninguno";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dia = $_POST["dia"];

        $resultado = "";

        if($dia <= 0 || $dia > 31){
            $resultado = "Has introducido un dia inválido";
            
        }else{
            if($dia > 15){
                $resultado = "Segunda quincena";
            }else{
                $resultado = "Primera quincena";
            }
        }



        setcookie("dia", $dia, time() + 3600);
        setcookie("resultado", $resultado, time() + 3600);

        echo "<h3>Resultados actuales:</h3>";
        echo "<p><strong>Dia:</strong> $dia</p>";
        echo "<p><strong>Resultado:</strong> $resultado</p>";

        echo "<h3>Valores anteriores:</h3>";
        echo "<p><strong>Dia anterior:</strong> $diaAnterior</p>";
        echo "<p><strong>Quincena anterior:</strong> $resultadoAnterior</p>";
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
    <h2>Ejercicio 4</h2>

    <form method="post">
        <label>Introduce el dia:</label><br>
        <input type="number" name="dia" id="dia" required><br><br>

        <input type="submit" value="Calcular">
    </form>

</body>
</html>
