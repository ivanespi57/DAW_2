<?php
session_start();
if (!isset($_SESSION['aprendiz'])) {
    die("Acceso no permitido.");
}
$aprendiz = $_SESSION['aprendiz'];
?>

<h1>Aprendiz registrado correctamente</h1>

<p><strong>Nombre:</strong> <?= htmlspecialchars($aprendiz['nombre']) ?></p>
<p><strong>Casa:</strong> <?= htmlspecialchars($aprendiz['casa']) ?></p>
<p><strong>Nivel:</strong> <?= htmlspecialchars($aprendiz['nivel']) ?></p>
<p><strong>Varita:</strong> <?= implode(', ', $aprendiz['varita']) ?></p>
<p><strong>Asignaturas:</strong> <?= implode(', ', $aprendiz['asigna']) ?></p>

<form action="volver.php" method="post">
    <button type="submit">Volver al formulario</button>
</form>
