<?php

    echo("
        <h1>Iván Espí Asins - DAW2</h1>
        <hr>
        <h1 style='color:lightgreen'>Formulario validado</h1>
        <h2>Resultado</h2>
        <p>Tu usuario es: " .  $_POST["usu"] . "<br><br></p>
        <p>Tu nombre es: " .  $_POST["nom"] . "<br><br></p>
        <p>Tu contraseña es: " . $_POST["pass"] . "<br><br></p>
        <p>Tu dirección es: " . $_POST["direc"] . "<br><br></p>
        <p>Tu CP es: " . $_POST["CP"] . "<br><br></p>
        <p>Tu email es: " . $_POST["email"] . "<br><br></p>
        <p>Tu rol es: " . $_POST["rol"] . "<br><br></p>"
    );

    echo "<p>Los tipos de alojamiento que quieres son: " . implode(", ", $_POST["tipoAloj"]) . "</p>";
    echo "<p>Las preferencias de servicios que prefieres son: " . implode(", ", $_POST["serv"]) . "</p>";

    if (!empty($_FILES["foto"])) {
        echo "<p>Tu foto:</p><img src='" . $_FILES["foto"] . "' width='150' style='border-radius:10px;'><br><br>";
    }

    echo("<form action='index.php' method='get'>
            <button type='submit'>Volver</button>
        </form>"
    );
?>
