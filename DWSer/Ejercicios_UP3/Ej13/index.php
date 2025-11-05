<?php
    include '../Ej12.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Resultados de validación:</h2>";

        codigoPostal($_POST["codPost"]);
        echo "<br><br>";

        NIF($_POST["nif"]);
        echo "<br><br>";

        fecha($_POST["fecha"]);
        echo "<br><br>";

        cadena($_POST["cadena"]);
        echo "<br><br>";

        mayusMinusEsp($_POST["mayusMinusEsp"]);
        echo "<br><br>";

        numerosSinEsp($_POST["numSinEsp"]);
        echo "<br><br>";

        conCasiTodo($_POST["conCasiTodo"]);
        echo "<br><br>";

        conTodo($_POST["conTodo"]);
        echo "<br><br>";

        email($_POST["email"]);
        echo "<br><br>";

        validarURL($_POST["url"]);
        echo "<br><br>";

        contraseña($_POST["pass"]);
        echo "<br><br>";

        IPv4($_POST["ipv4"]);
        echo "<br><br>";

        MAC($_POST["mac"]);
        echo "<br><br>";
    }
?>
