<?php
session_start();

require_once __DIR__ . '/../app/Database.php';


// Obtenemosel id del aprendiz o es null
$id = $_GET['id'] ?? null;

// Si no hay id, mostramos mensaje de error y detenemos la ejecución 
if (!$id) {
    die("Acceso no permitido.");
}

// Conectamos a la base de datos 
$database = new Database();
$conexion = $database->conectar();

// Buscamos el aprendiz por su id
$stmt = $conexion->prepare("SELECT * FROM aprendices WHERE id = :id");
$stmt->execute([':id' => $id]);
$aprendiz = $stmt->fetch();

// Si no se encuentra el aprendiz, mostramos mensaje de error y detenemos la ejecución
if (!$aprendiz) {
    die("Aprendiz no encontrado.");
}
?>

<!--Pon un h1 con el texto "Aprendiz registrado correctamente" y tu nombre-->
<h1>Aprendiz registrado correctamente - Iván Espí</h1>

<?php

    /***
     * Se deben mostrar todos los datos del aprendiz (de la foto mostrar el nommbre y la imagen)
     * Se puede imprimir el HTML directamente aquí (desde PHP) o poner el HTML fuera del bloque PHP.
     * La primera opción demuestra más dominio de PHP, la segunda es más sencilla.
     */
?>

<p><strong>Nombre:</strong> <?php echo $aprendiz['nombre']; ?></p>
<p><strong>Casa:</strong> <?php echo $aprendiz['casa']; ?></p>
<p><strong>Varita:</strong> <?php echo $aprendiz['varita']; ?></p>
<p><strong>Asignaturas:</strong> <?php echo $aprendiz['asignaturas']; ?></p>
<p><strong>Nivel:</strong> <?php echo $aprendiz['nivel']; ?></p>
<p><strong>Foto:</strong> <?php echo $aprendiz['foto']; ?></p>

<img src="<?php echo $aprendiz['foto']; ?>" width="200">

<!-- Agregar botón "Volver al formulario" (NO enlace). Ejecuta el script volver.php-->
<form action="volver.php" method="post">
    <button type="submit">Volver al formulario</button>
</form>
