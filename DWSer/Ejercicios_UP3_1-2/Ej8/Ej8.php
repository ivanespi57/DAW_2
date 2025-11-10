<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $confirmar = $_POST["confirmar"];
        $publicidad = isset($_POST["publicidad"]) ? "Sí" : "No";

        if ($email != $confirmar) {
            echo("Los correos no coinciden.");
        } else {
            echo("<h2>Resultado</h2>
                <p>Tu email es: $email<br><br> ¿Acepta publicidad?: $publicidad</p>"
            );
        }
        echo("<form action='index.php' method='get'>
                <button type='submit'>Volver</button>
            </form>");
    }
?>