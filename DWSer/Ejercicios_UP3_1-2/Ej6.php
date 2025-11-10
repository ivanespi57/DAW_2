<?php
    $combinacion = "4321";
    $maxIntentos = 4;
    $mensaje = "";

    if (isset($_POST["intentos"])) {
        $intentos = $_POST["intentos"];
    } else {
        $intentos = $maxIntentos;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo = $_POST["codigo"];

        if ($codigo === $combinacion) {
            $mensaje = "<p class='verde'>La caja fuerte se ha abierto.</p>";
            $intentos = $maxIntentos;
        } else {
            $intentos--;
            if ($intentos > 0) {
                $mensaje = "<p class='rojo'>Lo siento, esa no es la combinación. Te quedan $intentos intentos.</p>";
            } else {
                $mensaje = "<p class='rojo'>No quedan intentos. Caja bloqueada.</p>";
                $intentos = $maxIntentos;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Caja fuerte</title>
</head>
<body>

    <h2>Control de acceso a la caja fuerte</h2>
    <p>(Combinación: 4321)</p>

    <form method="post">
        <label>Introduce la combinación de la caja fuerte:</label><br>
        <input type="text" name="codigo" maxlength="4" required>
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <button type="submit">Probar</button>
    </form>
    <?php echo $mensaje; ?>

</body>
</html>
