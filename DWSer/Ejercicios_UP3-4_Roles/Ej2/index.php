<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>

<h1>Iván Espí Asins</h1>
<hr>
<h2>Ejercicio 2</h2>

<form action="procesar.php" method="post">

    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    
    <label>Apellido:</label>
    <input type="text" name="apellido" required><br><br>

    <label>Asignatura:</label>
    <input type="text" name="asigna" required><br><br>

    <label>Grupo:</label>
    <input type="text" name="grupo" required><br><br>

    <label>Edad:</label><br>
    <input type="radio" name="edad" value="mayor"> Mayor de edad<br>
    <input type="radio" name="edad" value="menor"> Menor de edad<br><br>

    <label>Cargo:</label><br>
    <input type="radio" name="cargo" value="sin"> Sin cargo<br>
    <input type="radio" name="cargo" value="con"> Con cargo<br><br>

    <input type="submit" value="Entrar">

</form>

</body>
</html>
