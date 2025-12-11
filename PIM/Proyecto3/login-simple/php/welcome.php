<?php
session_start();
if(!isset($_SESSION['autenticado'])){
    header("Location: ../index.html");
    exit;
}

$user = htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8');

$pdo = new PDO("mysql:host=localhost;dbname=login;charset=utf8mb4","root","");
$stmt = $pdo->prepare("SELECT codigo FROM usuarios WHERE user=?");
$stmt->execute([$user]);
$row = $stmt->fetch();

$codigo = $row['codigo'];
$sid = session_id();
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Bienvenido</title></head>
<body>

<h1>Bienvenido, <?php echo $user ?></h1>

<p><b>ID sesión:</b> <?php echo $sid ?></p>
<p><b>Tu código único (Base-36):</b> <?php echo $codigo ?></p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>
