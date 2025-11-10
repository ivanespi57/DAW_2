<?php
    session_start();
    if (!isset($_SESSION["datos"])) {
        header("Location: index.php");
        exit;
    }

    $datos = $_SESSION["datos"];
    session_unset();
    session_destroy();


    echo("<h2>Resultado</h2>
        <p>Tu nombre completo es: " .  $datos["nombre"] . " " .  $datos["apellido"] . "<br><br></p>
        <p>Tu nivel de estudios es: " . $datos["estudios"] . "<br><br></p>
        <p>Tu correo es: " . $datos["correo"] . "<br><br></p>"
    );

    echo "<p>Tu situación actual es: " . implode(", ", $datos["actual"]) . "</p>";

    if (!empty($datos["otroHbb"])) {
        echo "<p><strong>Otro hobby: " . $datos["otroHbb"] . "</p>";
    }

    echo("<form action='index.php' method='get'>
            <button type='submit'>Volver</button>
        </form>"
    );
?>