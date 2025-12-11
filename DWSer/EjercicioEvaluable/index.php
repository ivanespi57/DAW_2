<?php

    $err = [];
    $nom = "";
    $pass = "";
    $est = "";
    $nac = "";
    $idi = [];
    $email = "";
    $foto = "";

    $directorio = "imgs/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = trim($_POST["nom"]);
        $pass = $_POST["pass"];
        $est = $_POST["est"];
        $nac = $_POST["nac"];
        $idi = $_POST["idi"];
        if (!is_array($idi)){
            $idi = [];
        }   
        $email = trim($_POST["email"]);

        if (empty($nom)) {
            $err["nom"] = "El nombre es obligatorio.";
        }
        // strlen te pasa la longitud del string que le indiques, por eso le digo que "< 6"
        if (strlen($pass) < 6) {
            $err["pass"] = "La contraseña debe tener al menos 6 caracteres.";
        }
        if (empty($est)) {
            $err["est"] = "Selecciona tu nivel de estudios.";
        }
        if (empty($nac)) {
            $err["nac"] = "Selecciona tu nacionalidad.";
        }
        if (empty($idi)) {
            $err["idi"] = "Selecciona al menos un idioma.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err["email"] = "El email no es válido.";
        }

        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
            $fotoTmp = $_FILES["foto"]["tmp_name"];
            $fotoNombre = $_FILES["foto"]["name"];
            $fotoTam = $_FILES["foto"]["size"];

            $partes = explode(".", $fotoNombre);
            $ext = strtolower(end($partes));

            $extensionesValidas = ["jpg", "png", "gif"];

            if (!in_array($ext, $extensionesValidas)) {
                $err["foto"] = "Extensión no válida. Solo jpg, png o gif.";
            } elseif ($fotoTam > 50 * 1000) {
                $err["foto"] = "El tamaño máximo es 50 KB.";
            } else {

                if (!is_dir($directorio)) {
                    mkdir($directorio, 0777, true);
                }

                $fotoNuevoNombre = uniqid("foto_") . "." . $ext;
                $rutaDestino = $directorio . $fotoNuevoNombre;

                if (!move_uploaded_file($fotoTmp, $rutaDestino)) {
                    $err["foto"] = "Error al subir la foto.";
                } else {
                    $foto = $rutaDestino;
                }
            }
        } else {
            $err["foto"] = "Debes subir una foto.";
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario - Iván Espí Asins</title>
    </head>
    <body>

        <h2>Formulario de datos personales</h2>
        <hr>
        <ul>
            <li style="color:red"><?= $err["nom"] ?? "" ?></li><br>
            <li style="color:red"><?= $err["pass"] ?? "" ?></li><br>
            <li style="color:red"><?= $err["est"] ?? "" ?></li><br>
            <li style="color:red"><?= $err["nac"] ?? "" ?></li><br>
            <li style="color:red"><?= $err["idi"] ?? "" ?></li><br>
            <li style="color:red"><?= $err["email"] ?? "" ?></li><br>
            <li style="color:red"><?= $err["foto"] ?? "" ?></li><br>
        </ul>

        <form method="POST" action="index.php" enctype="multipart/form-data">

            <label>Nombre completo</label><br>
            <input type="text" name="nom" value="<?= $nom ?>"><br><br>

            <label>Contraseña</label><br>
            <input type="password" name="pass" value="<?= $pass ?>"><br><br>

            <label>Nivel de estudios</label><br>
            <select name="est">
                <option value="">Seleccione...</option>
                <option value="Sin estudios" <?= $est=="Sin estudios"?"selected":"" ?>>Sin estudios</option>
                <option value="ESO" <?= $est=="ESO"?"selected":"" ?>>Educación Secundaria Obligatoria</option>
                <option value="Bachillerato" <?= $est=="Bachillerato"?"selected":"" ?>>Bachillerato</option>
                <option value="FP" <?= $est=="FP"?"selected":"" ?>>Formación Profesional</option>
                <option value="Universitarios" <?= $est=="Universitarios"?"selected":"" ?>>Estudios Universitarios</option>
            </select><br><br>

            <label>Nacionalidad</label><br>
            <input type="radio" name="nac" value="Española" <?= $nac=="Española"?"checked":"" ?>> Española<br>
            <input type="radio" name="nac" value="Otra" <?= $nac=="Otra"?"checked":"" ?>> Otra<br><br>

            <label>Idiomas</label><br>

            <input type="checkbox" name="idi[]" value="Español" <?= in_array("Español", $idi) ? "checked" : "" ?>> Español<br>
            <input type="checkbox" name="idi[]" value="Inglés"  <?= in_array("Inglés",  $idi) ? "checked" : "" ?>> Inglés<br>
            <input type="checkbox" name="idi[]" value="Francés" <?= in_array("Francés", $idi) ? "checked" : "" ?>> Francés<br>
            <input type="checkbox" name="idi[]" value="Alemán"  <?= in_array("Alemán",  $idi) ? "checked" : "" ?>> Alemán<br>
            <input type="checkbox" name="idi[]" value="Italiano"<?= in_array("Italiano",$idi) ? "checked" : "" ?>> Italiano<br><br>

            <label>Email</label><br>
            <input type="text" name="email" value="<?= $email ?>"><br><br>

            <label>Adjuntar foto</label><br>
            <input type="file" name="foto" accept=".jpg,.png,.gif"><br><br>

            <input type="reset" name="limpiar" value="Limpiar">
            <input type="submit" name="validar" value="Validar">
            <input type="submit" name="enviar" value="Enviar" formaction="resultado.php">

        </form>
    </body>
</html>
