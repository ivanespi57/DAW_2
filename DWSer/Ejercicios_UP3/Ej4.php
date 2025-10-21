<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Calcular coste de 5 llamadas telefónicas</h2>

    <form method="post">
        <p>Introduce la duración (en minutos) de cada llamada:</p>

        <label>Llamada 1:</label>
        <input type="number" name="llamada1" min="0" required><br><br>

        <label>Llamada 2:</label>
        <input type="number" name="llamada2" min="0" required><br><br>

        <label>Llamada 3:</label>
        <input type="number" name="llamada3" min="0" required><br><br>

        <label>Llamada 4:</label>
        <input type="number" name="llamada4" min="0" required><br><br>

        <label>Llamada 5:</label>
        <input type="number" name="llamada5" min="0" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
        if ($_POST) {
            // Recoger las duraciones
            $llamadas = [
                $_POST['llamada1'],
                $_POST['llamada2'],
                $_POST['llamada3'],
                $_POST['llamada4'],
                $_POST['llamada5']
            ];

            $total = 0;

            echo "<hr>";
            echo "<h3>Resultados:</h3>";

            // Calcular el coste de cada llamada
            foreach ($llamadas as $i => $minutos) {
                if ($minutos <= 3) {
                    $costo = 0.10; // 10 céntimos
                } else {
                    $costo = 0.10 + ($minutos - 3) * 0.05; // 5 céntimos por cada minuto extra
                }

                $total += $costo;

                echo "<p>Llamada " . ($i + 1) . ": $minutos minutos → " . number_format($costo, 2) . " €</p>";
            }

            echo "<hr>";
            echo "<h3>💰 Coste total de las 5 llamadas: " . number_format($total, 2) . " €</h3>";
        }
    ?>
</body>
</html>