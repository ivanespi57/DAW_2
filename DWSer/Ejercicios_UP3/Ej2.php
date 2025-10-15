<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Calcular salario semanal</h2>

    <form method="post">
        <label>Nombre del trabajador:</label>
        <input type="text" name="nombre"><br><br>
        <label>Nº de horas a la semana:</label>
        <input type="number" name="horas"><br><br>

        <input type="checkbox" name="salMens" id="salMens">Calcular salario mensual<br><br>

        <input type="submit" value="Calcular"><br><br>
        
    </form>

    <?php
        if ($_POST) {
            $nombre = $_POST['nombre'];
            $horas = $_POST['horas'];

            if ($horas <= 40) {
                echo "<p>Trabajando $horas h a la semana, el salario de $nombre es de " . ($horas * 12) . " € a la semana.</p>";
            } else if ($horas >= 41){
                echo "<p>Trabajando $horas h a la semana, tu salario de $nombre es de " . ($horas * 16) . " € a la semana.</p>";
            }
        }
        
        if ($horas <= 40 && isset($_POST["salMens"])){
                echo "<p>Trabajando $horas h a la semana, tu salario de $nombre es de " . (($horas * 12) * 4) . " € al mes.</p>";
        }else if ($horas >= 41 && isset($_POST["salMens"])){
                echo "<p>Trabajando $horas h a la semana, tu salario de $nombre es de " . (($horas * 16) * 4) . " € al mes.</p>";
        }

        
    ?>
</body>
</html>
