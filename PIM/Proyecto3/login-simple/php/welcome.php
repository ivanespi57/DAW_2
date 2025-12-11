<?php
session_start();
if(!isset($_SESSION['autenticado'])){
    header("Location: ../index.html");
    exit;
}
$user = htmlspecialchars($_SESSION['user']);
$sid = session_id();
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Bienvenido</title></head>
<body>

<h1>Bienvenido, <?php echo $user ?></h1>
<p>ID sesión: <?php echo $sid ?></p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>
