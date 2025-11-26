<?php
    session_start();

    $numsAnt = isset($_COOKIE["nums"]) ? unserialize($_COOKIE["nums"]) : [];
    $mediaAnt = isset($_COOKIE["media"]) ? $_COOKIE["media"] : "Ninguna";
    $medianaAnt = isset($_COOKIE["mediana"]) ? $_COOKIE["mediana"] : "Ninguna";
    $modaAnt = isset($_COOKIE["moda"]) ? $_COOKIE["moda"] : "Ninguna";

    if (!isset($_SESSION["nums"])) {
        $_SESSION["nums"] = [];
        $_SESSION["media"] = "";
        $_SESSION["mediana"] = "";
        $_SESSION["moda"] = "";
    }

    function calcularMedia($nums) {
        return array_sum($nums) / count($nums);
    }

    function calcularMediana($nums) {
        sort($nums);
        $n = count($nums);
        if ($n % 2 == 0) {
            return ($nums[$n/2 - 1] + $nums[$n/2]) / 2;
        } else {
            return $nums[floor($n/2)];
        }
    }

    function calcularModa($nums) {
        $frecuencias = array_count_values($nums);
        $max = max($frecuencias);
        $modas = array_keys($frecuencias, $max);
        return implode(", ", $modas);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cadenaNums = $_POST["numeros"];
        $nums = array_map('intval', explode(",", $cadenaNums));

        $_SESSION["nums"] = $nums;

        if (isset($_POST["calcular_media"])) {
            $_SESSION["media"] = calcularMedia($nums);
        }

        if (isset($_POST["calcular_mediana"])) {
            $_SESSION["mediana"] = calcularMediana($nums);
        }

        if (isset($_POST["calcular_moda"])) {
            $_SESSION["moda"] = calcularModa($nums);
        }

        setcookie("nums", serialize($nums), time() + 3600);
        setcookie("media", $_SESSION["media"], time() + 3600);
        setcookie("mediana", $_SESSION["mediana"], time() + 3600);
        setcookie("moda", $_SESSION["moda"], time() + 3600);

        echo "<h3>Resultados actuales (Sesión):</h3>";
        echo "<p><strong>Números:</strong> " . implode(", ", $nums) . "</p>";

        echo "<p><strong>Media:</strong> " . ($_SESSION["media"] !== "" ? $_SESSION["media"] : "No calculada") . "</p>";
        echo "<p><strong>Mediana:</strong> " . ($_SESSION["mediana"] !== "" ? $_SESSION["mediana"] : "No calculada") . "</p>";
        echo "<p><strong>Moda:</strong> " . ($_SESSION["moda"] !== "" ? $_SESSION["moda"] : "No calculada") . "</p>";

        echo "<hr>";
        echo "<h3>Datos de la ejecución anterior (Cookies):</h3>";

        if (!empty($numsAnt)) {
            echo "<p><strong>Números anteriores:</strong> " . implode(", ", $numsAnt) . "</p>";
        } else {
            echo "<p>No hay datos anteriores.</p>";
        }

        echo "<p><strong>Media anterior:</strong> $mediaAnt</p>";
        echo "<p><strong>Mediana anterior:</strong> $medianaAnt</p>";
        echo "<p><strong>Moda anterior:</strong> $modaAnt</p>";
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
            <label>Introduce números separados por comas:</label><br><br>

            <input type="text" name="numeros" placeholder="Ej: 4,7,2,7,9" required><br><br>

            <label>Selecciona qué calcular:</label><br><br>

            <input type="checkbox" name="calcular_media"> Media<br>
            <input type="checkbox" name="calcular_mediana"> Mediana<br>
            <input type="checkbox" name="calcular_moda"> Moda<br><br>

            <input type="submit" value="Calcular">
        </form>

    </body>
</html>

