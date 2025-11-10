<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curso = $_POST["curso"];
        $modulos = isset($_POST["modulos"]) ? $_POST["modulos"] : [];
        $horas = isset($_POST["horas"]) ? $_POST["horas"] : [];

        if (empty($horas)) {
            echo "<p>Debes seleccionar al menos una hora.</p>";
        } else {
            echo "<h3>Horario generado:</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Hora</th><th>Curso</th><th>Módulos</th></tr>";
            foreach ($horas as $hora) {
                echo "<tr><td>$hora</td><td>$curso</td><td>" . implode(", ", $modulos) . "</td></tr>";
            }
            echo "</table>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horario</title>
</head>
<body>

    <form method="post">
        <h3>Selecciona curso:</h3>
        <input type="radio" name="curso" value="1º DAW" required> 1º DAW
        <input type="radio" name="curso" value="2º DAW"> 2º DAW
        <br><br>

        <h3>Selecciona módulos:</h3>
        <select name="modulos[]" multiple required>
            <option value="Programación">Programación</option>
            <option value="Bases de Datos">Bases de Datos</option>
            <option value="Desarrollo Web">Desarrollo Web</option>
        </select>
        <br><br>

        <h3>Horas:</h3>
        <input type="checkbox" name="horas[]" value="14:10 - 16:45"> 14:10 - 16:45
        <input type="checkbox" name="horas[]" value="17:15 - 18:10"> 17:15 - 18:10
        <input type="checkbox" name="horas[]" value="18:10 - 20:45"> 18:10 - 20:45
        <br><br>

        <input type="submit" value="Generar horario">
    </form>
</body>
</html>
