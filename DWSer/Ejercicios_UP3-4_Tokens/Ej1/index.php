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
    <title>Iván Espí Asins</title>
</head>
<body>

    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Ejercicio 1</h2>

    <form action="procesar.php" method="post">

        Usuario:
        <input type="text" name="usuario" required><br><br>

        Rol:
        <select name="rol" required>
            <option value="Gerente">Gerente</option>
            <option value="Sindicalista">Sindicalista</option>
            <option value="Nominas">Responsable de Nóminas</option>
        </select><br><br>

        <h3>Salarios</h3>
        <input type="number" name="salarios[]" required><br>
        <input type="number" name="salarios[]" required><br>
        <input type="number" name="salarios[]" required><br>
        <input type="number" name="salarios[]" required><br><br>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

        <input type="submit" value="Entrar">
    </form>

    <br>

    <form action="cambiar_sid.php" method="post">
        <input type="submit" value="Cambiar SID / Token">
    </form>

</body>
</html>
