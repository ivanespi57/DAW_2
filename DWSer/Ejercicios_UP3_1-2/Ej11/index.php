<?php
    session_start();

    $errores = [];
    $nombre = "";
    $contrasena = "";
    $estudios = "";
    $nacionalidad = "";
    $idiomas = [];
    $email = "";
    $foto = "";

    // Directorio para guardar las fotos
    $directorio = "uploads/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recogida de datos
        $nombre = trim($_POST["nombre"] ?? "");
        $contrasena = $_POST["contrasena"] ?? "";
        $estudios = $_POST["estudios"] ?? "";
        $nacionalidad = $_POST["nacionalidad"] ?? "";
        $idiomas = $_POST["idiomas"] ?? [];
        if (!is_array($idiomas)) $idiomas = [];
        $email = trim($_POST["email"] ?? "");

        // Validaciones
        if (empty($nombre)) {
            $errores["nombre"] = "El nombre es obligatorio.";
        }
        if (strlen($contrasena) < 6) {
            $errores["contrasena"] = "La contraseña debe tener al menos 6 caracteres.";
        }
        if (empty($estudios)) {
            $errores["estudios"] = "Selecciona tu nivel de estudios.";
        }
        if (empty($nacionalidad)) {
            $errores["nacionalidad"] = "Selecciona tu nacionalidad.";
        }
        if (empty($idiomas)) {
            $errores["idiomas"] = "Selecciona al menos un idioma.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "El email no es válido.";
        }

        // Validación de la imagen
        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
            $fotoTmp = $_FILES["foto"]["tmp_name"];
            $fotoNombre = $_FILES["foto"]["name"];
            $fotoTam = $_FILES["foto"]["size"];

            // Comprobamos que tiene extensión
            $partes = explode(".", $fotoNombre);
            $ext = strtolower(end($partes));

            $extensionesValidas = ["jpg", "jpeg", "png", "gif"];

            if (!in_array($ext, $extensionesValidas)) {
                $errores["foto"] = "Extensión no válida. Solo jpg, png o gif.";
            } elseif ($fotoTam > 50 * 1024) {
                $errores["foto"] = "El tamaño máximo es 50 KB.";
            } else {

                if (!is_dir($directorio)) {
                    mkdir($directorio, 0777, true);
                }

                $fotoNuevoNombre = uniqid("foto_") . "." . $ext;
                $rutaDestino = $directorio . $fotoNuevoNombre;

                if (!move_uploaded_file($fotoTmp, $rutaDestino)) {
                    $errores["foto"] = "Error al subir la foto.";
                } else {
                    $foto = $rutaDestino;
                }
            }
        } else {
            $errores["foto"] = "Debes subir una foto.";
        }

        if (isset($_POST["enviar"]) && empty($errores)) {
            $_SESSION["datos"] = [
                "nombre" => $nombre,
                "email" => $email,
                "estudios" => $estudios,
                "nacionalidad" => $nacionalidad,
                "idiomas" => $idiomas,
                "foto" => $foto
            ];
            header("Location: Ej11.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario - Iván Espí Asins</title>
    <style>
        label { font-weight: bold; }
        span { color: red; }
        body { font-family: Arial; margin: 20px; }
    </style>
</head>
<body>

<h2>Formulario de datos personales</h2>
<hr>

<form method="POST" action="index.php" enctype="multipart/form-data">

    <label>Nombre completo</label><br>
    <input type="text" name="nombre" value="<?= $nombre ?>"><br>
    <span><?= $errores["nombre"] ?? "" ?></span><br><br>

    <label>Contraseña</label><br>
    <input type="password" name="contrasena" value="<?= $contrasena ?>"><br>
    <span><?= $errores["contrasena"] ?? "" ?></span><br><br>

    <label>Nivel de estudios</label><br>
    <select name="estudios">
        <option value="">Seleccione...</option>
        <option value="Sin estudios" <?= $estudios=="Sin estudios"?"selected":"" ?>>Sin estudios</option>
        <option value="ESO" <?= $estudios=="ESO"?"selected":"" ?>>Educación Secundaria Obligatoria</option>
        <option value="Bachillerato" <?= $estudios=="Bachillerato"?"selected":"" ?>>Bachillerato</option>
        <option value="FP" <?= $estudios=="FP"?"selected":"" ?>>Formación Profesional</option>
        <option value="Universitarios" <?= $estudios=="Universitarios"?"selected":"" ?>>Estudios Universitarios</option>
    </select><br>
    <span><?= $errores["estudios"] ?? "" ?></span><br><br>

    <label>Nacionalidad</label><br>
    <input type="radio" name="nacionalidad" value="Española" <?= $nacionalidad=="Española"?"checked":"" ?>> Española<br>
    <input type="radio" name="nacionalidad" value="Otra" <?= $nacionalidad=="Otra"?"checked":"" ?>> Otra<br>
    <span><?= $errores["nacionalidad"] ?? "" ?></span><br><br>

    <label>Idiomas</label><br>
    <label>Idiomas</label><br>

    <input type="checkbox" name="idiomas[]" value="Español" <?= in_array("Español", $idiomas) ? "checked" : "" ?>> Español<br>
    <input type="checkbox" name="idiomas[]" value="Inglés"  <?= in_array("Inglés",  $idiomas) ? "checked" : "" ?>> Inglés<br>
    <input type="checkbox" name="idiomas[]" value="Francés" <?= in_array("Francés", $idiomas) ? "checked" : "" ?>> Francés<br>
    <input type="checkbox" name="idiomas[]" value="Alemán"  <?= in_array("Alemán",  $idiomas) ? "checked" : "" ?>> Alemán<br>
    <input type="checkbox" name="idiomas[]" value="Italiano"<?= in_array("Italiano",$idiomas) ? "checked" : "" ?>> Italiano<br>

    <span><?= $errores["idiomas"] ?? "" ?></span><br><br>


    <label>Email</label><br>
    <input type="email" name="email" value="<?= $email ?>"><br>
    <span><?= $errores["email"] ?? "" ?></span><br><br>

    <label>Adjuntar foto</label><br>
    <input type="file" name="foto" accept=".jpg,.jpeg,.png,.gif"><br>
    <span><?= $errores["foto"] ?? "" ?></span><br><br>

    <input type="reset" name="limpiar" value="Limpiar">
    <input type="submit" name="validar" value="Validar">
    <input type="submit" name="enviar" value="Enviar">

</form>

</body>
</html>
