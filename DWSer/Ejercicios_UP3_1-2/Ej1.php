<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Conversor de euros y pesetas</h2>

    <form method="post">
        <label>Importe:</label>
        <input type="number" name="importe" step="any"><br><br>

        <input type="radio" name="convertir" value="eurpes"> Euros a Pesetas<br>
        <input type="radio" name="convertir" value="peseur"> Pesetas a Euros<br><br>

        <input type="submit" value="Convertir">
    </form>

    <?php
        if ($_POST) {
            $importe = $_POST['importe'];
            $tipo = $_POST['convertir'];
            $cambio = 166.386;

            if ($tipo == "eurpes") {
                echo "$importe € son " . ($importe * $cambio) . " pesetas";
            } else {
                echo "$importe pesetas son " . ($importe / $cambio) . " euros";
            }
        }
    ?>
</body>
</html>
