<?php

$errores = [];

$nom = "";
$pass = "";
$est = "";
$nac = "";
$idi = [];
$email = "";

$directorio = "imgs/";
$fotoFinal = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = trim($_POST["nom"]);
    $pass = $_POST["pass"];
    $est = $_POST["est"];
    $nac = $_POST["nac"];
    $email = trim($_POST["email"]);

    if (isset($_POST["idi"])) {
        $idi = $_POST["idi"];
    }

    if ($nom == "") {
        $errores[] = "Nombre obligatorio";
    }

    if (strlen($pass) < 6) {
        $errores[] = "Contraseña mínimo 6 caracteres";
    }

    if ($est == "") {
        $errores[] = "Selecciona nivel de estudios";
    }

    if ($nac == "") {
        $errores[] = "Selecciona nacionalidad";
    }

    if (empty($idi)) {
        $errores[] = "Selecciona al menos un idioma";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Email incorrecto";
    }

    if (!isset($_FILES["foto"])) {
        $errores[] = "Debes subir una foto";
    } else {

        if ($_FILES["foto"]["error"] != UPLOAD_ERR_OK) {
            $errores[] = "Error al subir foto";
        } else {

            $partes = explode(".", $_FILES["foto"]["name"]);
            $ext = strtolower(end($partes));

            if ($ext != "jpg" && $ext != "png" && $ext != "gif") {
                $errores[] = "Extensión inválida";
            }

            if ($_FILES["foto"]["size"] > 50000) {
                $errores[] = "La foto supera 50 KB";
            }
        }
    }

    if (isset($_POST["enviar"])) {

        if (empty($errores)) {

            if (!is_dir($directorio)) {
                mkdir($directorio);
            }

            $fotoFinal = $directorio . time() . "." . $ext;

            move_uploaded_file($_FILES["foto"]["tmp_name"], $fotoFinal);

            $idiomas = implode(",", $idi);

            header("Location: resultado.php?nom=$nom&pass=$pass&est=$est&nac=$nac&email=$email&idi=$idiomas&foto=$fotoFinal");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>

<body>

    <h2>Formulario de datos</h2>
    <hr>

    <?php

        if ($errores) {

            echo "<ul style='color:red'>";

            foreach ($errores as $e) {
                echo "<li>$e</li>";
            }

            echo "</ul>";
        }

    ?>

    <form method="post" enctype="multipart/form-data">

        <label>Nombre completo</label><br>
        <input type="text" name="nom" value="<?= $nom ?>">

        <br><br>

        <label>Contraseña</label><br>
        <input type="password" name="pass">

        <br><br>

        <label>Nivel de estudios</label><br>

        <select name="est">

        <option value="">Seleccione...</option>
        <option value="ESO">ESO</option>
        <option value="Bachillerato">Bachillerato</option>
        <option value="FP">FP</option>
        <option value="Universitarios">Universitarios</option>

        </select>

        <br><br>

        <label>Nacionalidad</label><br>

        <input type="radio" name="nac" value="Española"> Española<br>
        <input type="radio" name="nac" value="Otra"> Otra

        <br><br>

        <label>Idiomas</label><br>

        <input type="checkbox" name="idi[]" value="Español"> Español<br>
        <input type="checkbox" name="idi[]" value="Inglés"> Inglés<br>
        <input type="checkbox" name="idi[]" value="Francés"> Francés<br>
        <input type="checkbox" name="idi[]" value="Alemán"> Alemán<br>
        <input type="checkbox" name="idi[]" value="Italiano"> Italiano

        <br><br>

        <label>Email</label><br>
        <input type="text" name="email" value="<?= $email ?>">

        <br><br>

        <label>Adjuntar foto</label><br>
        <input type="file" name="foto">

        <br><br>

        <input type="reset" value="Limpiar">
        <input type="submit" name="validar" value="Validar">
        <input type="submit" name="enviar" value="Enviar">

    </form>

</body>
</html>
