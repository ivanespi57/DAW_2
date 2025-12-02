<?php
    session_start();

    $errores = [];
    $nombre = "";
    $apellido = "";
    $correo = "";
    $estudios = "";
    $actual = [];
    $hobbies = [];
    $otroHobbie = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $correo = trim($_POST["correo"]);
        $estudios = $_POST["estudios"] ?? "";
        $actual = $_POST["actual"] ?? [];
        $hobbies = $_POST["hobbies"] ?? [];
        $otroHobbie = trim($_POST["otroHbb"] ?? "");

        if (empty($nombre)) $errores["nombre"] = "El nombre es obligatorio.";
        if (empty($apellido)) $errores["apellido"] = "Los apellidos son obligatorios.";
        if (empty($correo)) $errores["correo"] = "Introduce un correo válido.";
        if (empty($estudios)) $errores["estudios"] = "Selecciona tu nivel de estudios.";
        if (empty($actual)) $errores["actual"] = "Selecciona al menos una situación.";
        if (empty($hobbies)) $errores["hobbies"] = "Selecciona al menos un hobbie.";

        if (isset($_POST["enviar"]) && empty($errores)) {

            $_SESSION["datos"] = [
                "nombre" => $nombre,
                "apellido" => $apellido,
                "correo" => $correo,
                "estudios" => $estudios,
                "actual" => $actual,
                "hobbies" => $hobbies,
                "otroHbb" => $otroHobbie
            ];

            header("Location: Ej9.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 9 – Sesiones</title>
        <style>
            label { font-weight: bold; }
            span { color: red; }
        </style>
    </head>
    <body>

    <h1>Formulario de recogida de datos</h1>

    <form method="POST" action="index.php">

        <label>Nombre</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" size="25"><br>
        <span><?= $errores["nombre"] ?? "" ?></span><br><br>

        <label>Apellidos</label><br>
        <input type="text" name="apellido" value="<?= htmlspecialchars($apellido) ?>" size="25"><br>
        <span><?= $errores["apellido"] ?? "" ?></span><br><br>

        <label>Correo electrónico</label><br>
        <input type="email" name="correo" value="<?= htmlspecialchars($correo) ?>" placeholder="ejemplo@gmail.com"><br>
        <span><?= $errores["correo"] ?? "" ?></span><br><br>

        <label>Nivel de estudios</label><br>
        <select name="estudios">
            <option value="">Seleccione...</option>
            <option value="ESO" <?= $estudios=="ESO"?"selected":"" ?>>ESO</option>
            <option value="Bachillerato" <?= $estudios=="Bachillerato"?"selected":"" ?>>Bachillerato</option>
            <option value="Grado Medio" <?= $estudios=="Grado Medio"?"selected":"" ?>>Grado Medio</option>
            <option value="Grado Superior" <?= $estudios=="Grado Superior"?"selected":"" ?>>Grado Superior</option>
            <option value="Universidad" <?= $estudios=="Universidad"?"selected":"" ?>>Universidad</option>
        </select><br>
        <span><?= $errores["estudios"] ?? "" ?></span><br><br>

        <label>Situación actual</label><br>
        <input type="checkbox" name="actual[]" value="Estudiando" <?= in_array("Estudiando",$actual)?"checked":"" ?>> Estudiando<br>
        <input type="checkbox" name="actual[]" value="Trabajando" <?= in_array("Trabajando",$actual)?"checked":"" ?>> Trabajando<br>
        <input type="checkbox" name="actual[]" value="Buscando empleo" <?= in_array("Buscando empleo",$actual)?"checked":"" ?>> Buscando empleo<br>
        <input type="checkbox" name="actual[]" value="Desempleado" <?= in_array("Desempleado",$actual)?"checked":"" ?>> Desempleado<br>
        <span><?= $errores["actual"] ?? "" ?></span><br><br>

        <label>Hobbies</label><br>
        <input type="checkbox" name="hobbies[]" value="Videojuegos" <?= in_array("Videojuegos",$hobbies)?"checked":"" ?>> Videojuegos<br>
        <input type="checkbox" name="hobbies[]" value="Deporte" <?= in_array("Deporte",$hobbies)?"checked":"" ?>> Deporte<br>
        <input type="checkbox" name="hobbies[]" value="Leer" <?= in_array("Leer",$hobbies)?"checked":"" ?>> Leer<br>
        <input type="checkbox" name="hobbies[]" value="Tejer" <?= in_array("Tejer",$hobbies)?"checked":"" ?>> Tejer<br>

        <input type="checkbox" name="hobbies[]" value="Otro" <?= in_array("Otro",$hobbies)?"checked":"" ?>> Otro:
        <input type="text" name="otroHbb" value="<?= htmlspecialchars($otroHobbie) ?>"><br>

        <span><?= $errores["hobbies"] ?? "" ?></span><br><br>

        <input type="submit" name="validar" value="Validar">
        <input type="submit" name="enviar" value="Enviar">

    </form>

    </body>
</html>
