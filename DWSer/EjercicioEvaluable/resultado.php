<?php

    echo("
        <h1>Iván Espí Asins - DAW2</h1>
        <hr>
        <h1 style='color:lightgreen'>Formulario validado</h1>
        <h2>Resultado</h2>
        <p>Tu nombre completo es: " .  $_POST["nom"] . "<br><br></p>
        <p>Tu contraseña es: " . $_POST["pass"] . "<br><br></p>
        <p>Tu nivel de estudios es: " . $_POST["est"] . "<br><br></p>
        <p>Tu nacionalidad es: " . $_POST["nac"] . "<br><br></p>
        <p>Tu email es: " . $_POST["email"] . "<br><br></p>"
    );

    echo "<p>Los idiomas que hablas son: " . implode(", ", $_POST["idi"]) . "</p>";

    if (!empty($_FILES["foto"])) {
        echo "<p>Tu foto:</p><img src='" . $_FILES["foto"] . "' width='150' style='border-radius:10px;'><br><br>";
    }

    echo("<form action='index.php' method='get'>
            <button type='submit'>Volver</button>
        </form>"
    );
?>
