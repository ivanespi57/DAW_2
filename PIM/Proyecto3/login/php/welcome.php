<?php
session_start();

// Verificar sesión
if (!isset($_SESSION['autenticado']) || !isset($_SESSION['user'])) {
    header("Location: ../index.html");
    exit;
}

$user = htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8');

// Conexión PDO
$pdo = new PDO("mysql:host=localhost;dbname=login;charset=utf8mb4", "ivan", "1234");
$stmt = $pdo->prepare("SELECT codigo FROM usuarios WHERE user=?");
$stmt->execute([$user]);
$row = $stmt->fetch();

if (!$row) {
    echo "Error: usuario no encontrado en la BD";
    exit;
}

$codigo = htmlspecialchars($row['codigo'], ENT_QUOTES, 'UTF-8');
$sid = session_id();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
</head>
<body>

<h1>Bienvenido, <?php echo $user ?></h1>

<p><b>ID sesión:</b> <?php echo $sid ?></p>
<p><b>Tu código único (Base-36):</b> <?php echo $codigo ?></p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>
