<?php

    $numerosAnt = isset($_COOKIE["numeros"]) ? $_COOKIE["numeros"] : "Ninguno";
    $opsAnt = isset($_COOKIE["operaciones"]) ? $_COOKIE["operaciones"] : "Ninguna";
    $resAnt = isset($_COOKIE["resultado"]) ? $_COOKIE["resultado"] : "Ningún cálculo previo";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $numeros = $_POST["numeros"];
        $ops = isset($_POST["ops"]) ? $_POST["ops"] : [];

        setcookie("numeros", $numeros, time() + 3600);
        setcookie("operaciones", implode(", ", $ops), time() + 3600);

        $arr = explode(",", $numeros);

        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i] = trim($arr[$i]);
        }

        $arrOrdenados = $arr;
        sort($arrOrdenados, SORT_NUMERIC);

        echo "<h3>Cálculo actual:</h3>";
        echo "<p><strong>Números:</strong> $numeros</p>";
        echo "<p><strong>Operaciones:</strong> " . implode(", ", $ops) . "</p>";

        $resultado = "";

        if (in_array("media", $ops)) {
            $suma = 0;
            for ($i = 0; $i < count($arr); $i++) {
                $suma += $arr[$i];
            }
            $media = $suma / count($arr);
            $resultado .= "Media: $media<br>";
        }

        if (in_array("mediana", $ops)) {
            $n = count($arrOrdenados);
            if ($n % 2 == 0) {
                $mediana = ($arrOrdenados[$n/2 - 1] + $arrOrdenados[$n/2]) / 2;
            } else {
                $mediana = $arrOrdenados[floor($n/2)];
            }
            $resultado .= "Mediana: $mediana<br>";
        }

        if (in_array("moda", $ops)) {
            $contador = [];

            for ($i = 0; $i < count($arr); $i++) {
                $valor = $arr[$i];
                if (!isset($contador[$valor])) {
                    $contador[$valor] = 1;
                } else {
                    $contador[$valor]++;
                }
            }

            $max = 0;
            foreach ($contador as $num => $freq) {
                if ($freq > $max) $max = $freq;
            }

            $modas = [];
            foreach ($contador as $num => $freq) {
                if ($freq == $max) {
                    $modas[] = $num;
                }
            }

            $resultado .= "Moda: " . implode(", ", $modas) . "<br>";
        }

        echo "<p><strong>Resultados:</strong><br>$resultado</p>";

        setcookie("resultado", $resultado, time() + 3600);

        echo "<hr>";
        echo "<h3>Datos de la ejecución anterior:</h3>";
        echo "<p><strong>Números anteriores:</strong> $numerosAnt</p>";
        echo "<p><strong>Operaciones anteriores:</strong> $opsAnt</p>";
        echo "<p><strong>Resultado anterior:</strong><br>$resAnt</p>";
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
    <h2>Ejercicio 8</h2>

    <form method="post">

        <label>Introduce números separados por comas:</label><br>
        <input type="text" name="numeros" required style="width:300px"><br><br>

        <label>Selecciona operaciones:</label><br>
        <input type="checkbox" name="ops[]" value="media"> Media<br>
        <input type="checkbox" name="ops[]" value="mediana"> Mediana<br>
        <input type="checkbox" name="ops[]" value="moda"> Moda<br><br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>
