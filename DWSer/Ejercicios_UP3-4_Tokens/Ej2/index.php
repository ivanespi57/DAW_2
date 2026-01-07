<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>

    <h1>Ejercicio 2</h1>
    <hr>

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

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

        <input type="submit" value="Entrar">
    </form>

    <br>

    <form action="cambiar_sid.php" method="post">
        <input type="submit" value="Cambiar SID / Token">
    </form>

</body>
</html>
