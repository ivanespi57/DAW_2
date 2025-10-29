<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <h2>Formulario de recogida de datos</h2>

    <form method="post" action="Ej9.php">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Primer apellido:</label><br>
        <input type="text" name="apellido" required><br><br>

        <label>Nivel de estudios:</label><br>
        <select name="estudios" required>
            <option>Seleccione...</option>
            <option value="ESO">ESO</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="Grado Medio">Grado medio</option>
            <option value="Grado Superior">Grado superior</option>
            <option value="Grado Universitario">Grado universitario</option>
        </select>
        <br><br>

        <label>Situación actual:</label><br>
        <select name="actual[]" multiple required>
            <option name="actual[]" value="Estudiando">Estudiando</option>
            <option name="actual[]" value="Trabajando">Trabajando</option>
            <option name="actual[]" value="Desempleado">Desempleado</option>
            <option name="actual[]" value="Buscando Empleo">Buscando empleo</option>
        </select>
        <br><br>

        <label>Hobbies</label><br>
        <label>
            <input type="checkbox" name="hobbies[]" value="jugVideo">Jugar videojuegos <br>
            <input type="checkbox" name="hobbies[]" value="depor">Hacer deporte <br>
            <input type="checkbox" name="hobbies[]" value="leer">Leer <br>
            <input type="checkbox" name="hobbies[]" value="tejer">Tejer <br>
            <input type="checkbox" name="hobbies[]" value="otro" id="otroHob"> Otro:
            <input type="text" name="hobbies[]" id="otroHob" placeholder="Escribe aquí...">
        </label><br><br>

        <input type="submit" value="Enviar">
        <input type="submit" value="Validar">
    </form>

</body>
</html>
