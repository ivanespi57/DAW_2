<?php

    $emailAnt = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "Ninguno";
    $publiAnt = isset($_COOKIE["publicidad"]) ? $_COOKIE["publicidad"] : "Ninguna";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];
        $publicidad = isset($_POST["publicidad"]) ? "Sí" : "No";

        setcookie("email", $email, time() + 3600);
        setcookie("publicidad", $publicidad, time() + 3600);

        echo "<h3>Datos de la ejecución actual:</h3>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>¿Desea publicidad?:</strong> $publicidad</p>";

        echo "<hr>";

        echo "<h3>Datos de la ejecución anterior:</h3>";
        echo "<p><strong>Email anterior:</strong> $emailAnt</p>";
        echo "<p><strong>Publicidad anterior:</strong> $publiAnt</p>";
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
    <h2>Ejercicio 10</h2>

<form method="post">

    <label>Correo electrónico:</label><br>
    <input type="email" name="email" required><br><br>

    <label>
        <input type="checkbox" name="publicidad">
        Deseo recibir publicidad
    </label>
    <br><br>

    <input type="submit" value="Guardar preferencias">

</form>

</body>
</html>
