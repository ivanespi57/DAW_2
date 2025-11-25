<?php
    session_start();

    $correcta = "1234";
    $maxIntentos = 4;

    $anteriores = isset($_COOKIE["anteriores"]) ? unserialize($_COOKIE["anteriores"]) : [];
    $estado_anterior = isset($_COOKIE["estado_anterior"]) ? $_COOKIE["estado_anterior"] : "";

    if (!isset($_SESSION["intentos"])) {
        $_SESSION["intentos"] = 0;
        $_SESSION["actuales"] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $clave = $_POST["clave"];
        $_SESSION["actuales"][] = $clave;
        $_SESSION["intentos"]++;

        echo "<h3>Resultado actual:</h3>";

        if ($clave == $correcta) {
            echo "<p><strong>Contraseña correcta. Caja fuerte abierta.</strong></p>";
            $finalizado = "¡Abierta correctamente!";
        } else {
            echo "<p><strong>Contraseña incorrecta.</strong></p>";
            $finalizado = ($_SESSION["intentos"] >= $maxIntentos) 
                ? "No se consiguió abrir (máximo de intentos)" 
                : "";
        }

        echo "<p><strong>Contraseña introducida:</strong> $clave</p>";

        if ($finalizado != "") {
            setcookie("anteriores", serialize($_SESSION["actuales"]), time() + 3600);
            setcookie("estado_anterior", 
                    "Contraseña correcta: $correcta — $finalizado", 
                    time() + 3600);

            $_SESSION["intentos"] = 0;
            $_SESSION["actuales"] = [];
        }

        echo "<h3>Datos de la sesión actual:</h3>";
        echo "<p><strong>Intentos actuales:</strong> " . $_SESSION["intentos"] . "</p>";

        echo "<p><strong>Contraseñas introducidas esta sesión:</strong></p><ul>";
        foreach ($_SESSION["actuales"] as $c) echo "<li>$c</li>";
        echo "</ul>";

        echo "<h3>Datos de la ejecución anterior (Cookies):</h3>";

        if (!empty($anteriores)) {
            echo "<p><strong>Contraseñas introducidas la última vez:</strong></p><ul>";
            foreach ($anteriores as $c) echo "<li>$c</li>";
            echo "</ul>";
        } else {
            echo "<p>No hay datos previos.</p>";
        }

        if ($estado_anterior != "") {
            echo "<p><strong>Resultado final anterior:</strong> $estado_anterior</p>";
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
    <h2>Ejercicio 7</h2>

    <form method="post">
        <label>Introduce la contraseña:</label>
        <input type="password" name="clave" required>
        <br><br>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
