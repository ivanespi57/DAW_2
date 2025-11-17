<?php

    $numerosAnt = isset($_COOKIE["numeros"]) ? $_COOKIE["numeros"] : "Ninguno";
    $opsAnt = isset($_COOKIE["operaciones"]) ? unserialize($_COOKIE["operaciones"]) : [];
    $resAnt = isset($_COOKIE["resultados"]) ? unserialize($_COOKIE["resultados"]) : [];

    function calcularMedia($nums) {
        return array_sum($nums) / count($nums);
    }

    function calcularMediana($nums) {
        sort($nums);
        $count = count($nums);
        $middle = floor($count / 2);

        if ($count % 2 === 0) {
            return ($nums[$middle - 1] + $nums[$middle]) / 2;
        } else {
            return $nums[$middle];
        }
    }

    function calcularModa($nums) {
        $counts = array_count_values($nums);
        $max = max($counts);
        $modas = array_keys($counts, $max);
        return implode(", ", $modas);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $numerosTexto = $_POST["numeros"];
        $numeros = array_map('floatval', array_filter(array_map('trim', explode(",", $numerosTexto))));

        $ops = isset($_POST["ops"]) ? $_POST["ops"] : [];

        if (in_array("todas", $ops)) {
            $ops = ["media", "mediana", "moda"];
        }

        $resultados = [];

        if (in_array("media", $ops)) {
            $resultados["media"] = calcularMedia($numeros);
        }
        if (in_array("mediana", $ops)) {
            $resultados["mediana"] = calcularMediana($numeros);
        }
        if (in_array("moda", $ops)) {
            $resultados["moda"] = calcularModa($numeros);
        }

        setcookie("numeros", $numerosTexto, time() + 3600);
        setcookie("operaciones", serialize($ops), time() + 3600);
        setcookie("resultados", serialize($resultados), time() + 3600);

        echo "<h3>Resultados actuales:</h3>";
        echo "<p><strong>Números:</strong> $numerosTexto</p>";

        echo "<ul>";
        foreach ($resultados as $op => $res) {
            echo "<li><strong>$op:</strong> $res</li>";
        }
        echo "</ul>";

        echo "<h3>Datos de la ejecución anterior (cookies):</h3>";
        echo "<p><strong>Números anteriores:</strong> $numerosAnt</p>";

        if (!empty($opsAnt)) {
            echo "<p><strong>Operaciones anteriores:</strong></p><ul>";
            foreach ($opsAnt as $o) { echo "<li>$o</li>"; }
            echo "</ul>";

            echo "<p><strong>Resultados anteriores:</strong></p><ul>";
            foreach ($resAnt as $op => $res) {
                echo "<li><strong>$op:</strong> $res</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay cálculos anteriores.</p>";
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
    <h2>Ejercicio 8 - Media, Mediana y Moda</h2>

    <form method="post">
        <label>Introduce números separados por comas:</label><br>
        <input type="text" name="numeros" required>
        <br><br>

        <label>Selecciona operaciones:</label><br>
        <input type="checkbox" name="ops[]" value="media"> Media<br>
        <input type="checkbox" name="ops[]" value="mediana"> Mediana<br>
        <input type="checkbox" name="ops[]" value="moda"> Moda<br>
        <input type="checkbox" name="ops[]" value="todas"> Todas<br><br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>
