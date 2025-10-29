<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $estudios = trim($_POST["estudios"]);
        $actual = isset($_POST["actual"]) ? $_POST["actual"] : [];
        $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
        $otroHob = trim($_POST["otroHob"]);

        echo("<h2>Resultado</h2>
            <p>Tu nombre completo es: $nombre $apellido<br><br></p>
            <p>Tu nivel de estudios es: $estudios<br><br></p>"
        );

        echo "<p>Tu situación actual es: " . implode(", ", $actual) . "</p>";

        echo("<form action='index.php' method='get'>
                <button type='submit'>Volver</button>
            </form>"
        );
    }
?>