<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>

<h1>Iván Espí Asins</h1>
<hr>
<h2>Ejercicio 1</h2>

<form action="procesar.php" method="post">

    <label>Usuario:</label>
    <input type="text" name="usuario" required><br><br>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="Gerente">Gerente</option>
        <option value="Sindicalista">Sindicalista</option>
        <option value="Nominas">Responsable de Nóminas</option>
    </select><br><br>

    <h3>Salarios de empleados</h3>
    <input type="number" name="salarios[]" required><br>
    <input type="number" name="salarios[]" required><br>
    <input type="number" name="salarios[]" required><br>
    <input type="number" name="salarios[]" required><br><br>

    <input type="submit" value="Entrar">
</form>

</body>
</html>
