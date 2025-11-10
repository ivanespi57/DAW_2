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
        <p>Tu nombre completo es: " .  $datos["nombre"] . "<br><br></p>
        <p>Tu nivel de estudios es: " . $datos["estudios"] . "<br><br></p>
        <p>Tu nacionalidad es: " . $datos["nacionalidad"] . "<br><br></p>
        <p>Tu email es: " . $datos["email"] . "<br><br></p>"
    );

    echo "<p>Los idiomas que hablas son: " . implode(", ", $datos["idiomas"]) . "</p>";

    if (!empty($datos["foto"])) {
        echo "<p>Tu foto:</p><img src='" . $datos["foto"] . "' width='150' style='border-radius:10px;'><br><br>";
    }

    echo("<form action='index.php' method='get'>
            <button type='submit'>Volver</button>
        </form>"
    );
?>
