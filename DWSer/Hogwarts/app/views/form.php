<?php
session_start();
require_once '../app/validaciones.php';

// Datos y errores desde la sesión
$datos   = $_SESSION['datos_form'] ?? [];
$errores = $_SESSION['errores'] ?? [];
$varita  = $datos['varita'] ?? [];
$asigna  = $datos['asigna'] ?? [];

// Inicializar token
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(24));
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    // Limpiar
    if ($accion === 'eliminar') {
        unset($_SESSION['datos_form'], $_SESSION['errores']);
        $datos = $errores = $varita = $asigna = [];
    }

    // Validar
    if ($accion === 'validar') {
        $errores = validarFormulario($_POST);
        $_SESSION['errores'] = $errores;
        $_SESSION['datos_form'] = $_POST;

        $datos = $_POST;
        $varita = $datos['varita'] ?? [];
        $asigna = $datos['asigna'] ?? [];
    }

    // Enviar
    if ($accion === 'enviar') {
        $errores = validarFormulario($_POST);
        $_SESSION['errores'] = $errores;

        if (empty($errores)) {
            $_SESSION['aprendiz'] = [
                'nombre' => $_POST['nombre'],
                'casa'   => $_POST['casa'],
                'nivel'  => $_POST['nivel'],
                'varita' => $_POST['varita'] ?? [],
                'asigna' => $_POST['asigna'] ?? []
            ];
            header('Location: resultado.php');
            exit;
        } else {
            $_SESSION['datos_form'] = $_POST;
            $datos = $_POST;
            $varita = $datos['varita'] ?? [];
            $asigna = $datos['asigna'] ?? [];
        }
    }
}
?>

<h1>Iván Espí Asins</h1>

<!-- Mostrar errores -->
<?php if (!empty($errores)): ?>
    <ul style="color:red;">
        <?php foreach($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

    <p>
        <label>Nombre del aprendiz:</label>
        <input type="text" name="nombre" value="<?= $datos['nombre'] ?? '' ?>">
    </p>

    <p>
        <label>Casa:</label>
        <select name="casa">
            <option value="">-- Selecciona tu casa --</option>
            <?php foreach(['Gryffindor','Slytherin','Hufflepuff','Ravenclaw'] as $c): ?>
                <option value="<?= $c ?>" <?= (isset($datos['casa']) && $datos['casa'] === $c) ? 'selected' : '' ?>><?= $c ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Varita:</p>
    <?php 
    $opcionesVarita = ['Roble con núcleo de fénix', 'Sauce con núcleo de unicornio', 'Acebo con núcleo de dragón'];
    foreach($opcionesVarita as $v): ?>
        <label>
            <input type="checkbox" name="varita[]" value="<?= $v ?>" <?= in_array($v, $varita) ? 'checked' : '' ?>> <?= $v ?>
        </label><br>
    <?php endforeach; ?>

    <p>Asignaturas favoritas:</p>
    <?php 
    $opcionesAsigna = ['Pociones','Herbologia','Encantamientos','Defensa'];
    foreach($opcionesAsigna as $a): ?>
        <label>
            <input type="checkbox" name="asigna[]" value="<?= $a ?>" <?= in_array($a, $asigna) ? 'checked' : '' ?>> <?= $a ?>
        </label><br>
    <?php endforeach; ?>

    <p>
        <label>Nivel mágico (1-100):</label>
        <input type="text" name="nivel" value="<?= $datos['nivel'] ?? ''?>">
    </p>

    <p>
        <label>Foto del aprendiz:</label>
        <input type="file" name="imagen">
    </p>

    <button type="submit" name="accion" value="validar">VALIDAR</button>
    <button type="submit" name="accion" value="enviar">ENVIAR</button>
    <button type="submit" name="accion" value="eliminar">LIMPIAR</button>
</form>
