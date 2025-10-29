<?php

    $mensaje = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $confirmar = $_POST["confirmar"];
        $publicidad = isset($_POST["publicidad"]) ? "Sí" : "No";

        if ($email != $confirmar) {
            $mensaje = "Los correos no coinciden.";
        } else {
            $mensaje = "Tu email es: $email<br> ¿Acepta publicidad?: $publicidad";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario sencillo</title>
</head>
<body>

    <h2>Formulario de suscripción</h2>

    <p><?php echo $mensaje; ?></p>

    <form method="post">
        <label>Correo electrónico:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Confirma tu correo:</label><br>
        <input type="email" name="confirmar" required><br><br>

        <label>
            <input type="checkbox" name="publicidad"> Acepto recibir publicidad
        </label><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>

</body>
</html>
