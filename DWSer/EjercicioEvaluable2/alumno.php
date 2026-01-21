<?php

    session_start();

    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));
    }
    
    require_once 'validaciones.php';
    $err[] = "";
    $usu = "";
    $pass = "";
    $nom = "";
    $email = "";
    $direc = "";
    $CP = "";
    $rol = "";
    $tipoAloj[] = "";
    $serv[] = "";
    $alquiler = "";
    $foto = "";

    $directorio = "uploads/";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $usu = isset($_POST['usu']) ? $_POST['usu'] : null;
        $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
        $nom =  isset($_POST['nom']) ? $_POST['nom'] : null;
        $direc = $_POST["direc"];
        $CP = isset($_POST['CP']) ? $_POST['CP'] : null;
        $rol = $_POST["rol"];
        $tipoAloj = $_POST["tipoAloj"];
        $serv = $_POST["serv"];
        $alquiler = $_POST["alquiler"];

        if (!is_array($tipoAloj)){
            $tipoAloj = []; 
        }
        if (!is_array($serv)){
            $serv = [];
        }  
        $email = isset($_POST['nom']) ? $_POST['nom'] : null;

        if (!validaRequerido($nom)) { //Valida que el campo nombre no esté vacío.
            $err[] = 'El campo nombre es incorrecto.';
        }
        if (!validaEmail($email)) { //Valida que el campo email sea correcto.
            $err[] = 'El campo email es incorrecto.';
        }
        if (!validaAlfabeto($usu)) { //Valida que el campo usuario sea correcto.
            $err[] = 'El campo usuario es incorrecto.';
        }
        if (!validaNumero($CP)) { //Valida que el campo CP sea correcto.
            $err[] = 'El campo CP es incorrecto.';
        }
        if (strlen($pass) < 6) {
            $err["pass"] = "La contraseña debe tener al menos 6 caracteres.";
        }
        if (empty($tipoAloj)) {
            $err["tipoAloj"] = "Selecciona al menos un tipo de alojamiento.";
        }
        if (empty($serv)) {
            $err["serv"] = "Selecciona al menos una preferencia de servicio.";
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

        <h2>SENIATOURS</h2>
        <hr>
        <?php if ($err): ?>
            <ul style="color: #f00;">
            <?php foreach ($err as $erro): ?>
            <li> <?php echo $erro ?> </li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="POST" action="alumno.php" enctype="multipart/form-data">
            
        <label>Usuario</label><br>
            <input type="text" name="usu" value="<?= $usu ?>"><br><br>
            
            <label>Contraseña</label><br>
            <input type="password" name="pass" value="<?= $pass ?>"><br><br>
            
            <label>Nombre</label><br>
            <input type="text" name="nom" value="<?= $nom ?>"><br><br>
            
            <label>Email</label><br>
            <input type="text" name="email" value="<?= $email ?>"><br><br>

            <label>Dirección</label><br>
            <input type="text" name="direc" value="<?= $direc ?>"><br><br>

            <label>CP</label><br>
            <input type="text" name="nom" value="<?= $CP ?>"><br><br>

            <label>Rol:</label>
            <select name="rol" required>
                <option value="Usuario nuevo">Usuario nuevo</option>
                <option value="Usuario registrado">usuario registrado</option>
            </select><br><br>

            <label>Tipo Alojamiento</label><br>

            <input type="checkbox" name="tipoAloj[]" value="Chalet" <?= in_array("Chalet", $tipoAloj) ? "checked" : "" ?>> Chalet<br>
            <input type="checkbox" name="tipoAloj[]" value="Piso"  <?= in_array("Piso",  $tipoAloj) ? "checked" : "" ?>> Piso<br>
            <input type="checkbox" name="tipoAloj[]" value="Apartamento" <?= in_array("Apartamento", $tipoAloj) ? "checked" : "" ?>> Apartamento<br>
            <input type="checkbox" name="tipoAloj[]" value="Cabaña"  <?= in_array("Cabaña",  $tipoAloj) ? "checked" : "" ?>> Cabaña<br>
            <input type="checkbox" name="tipoAloj[]" value="Casa Rural"<?= in_array("Casa Rural",$tipoAloj) ? "checked" : "" ?>> Casa Rural<br><br>
            
            <label>Preferencias de servicios</label><br>

            <input type="checkbox" name="serv[]" value="Zona comercial" <?= in_array("Zona comercial", $serv) ? "checked" : "" ?>> Zona comercial<br>
            <input type="checkbox" name="serv[]" value="Piscina"  <?= in_array("Piscina",  $serv) ? "checked" : "" ?>> Piscina<br>
            <input type="checkbox" name="serv[]" value="Parking" <?= in_array("Parking", $serv) ? "checked" : "" ?>> Parking<br>
            <input type="checkbox" name="serv[]" value="Parque infantil"  <?= in_array("Parque infantil",  $serv) ? "checked" : "" ?>> Parque infantil<br>
            <input type="checkbox" name="serv[]" value="Transporte público"<?= in_array("Transporte público",$serv) ? "checked" : "" ?>> Transporte público<br><br>
            <input type="checkbox" name="serv[]" value="Amueblado"<?= in_array("Amueblado",$serv) ? "checked" : "" ?>> Amueblado<br><br>

            <label>Alquiler</label><br>
            <select name="alquiler">
                <option value="">Seleccione...</option>
                <option value="Días" <?= $alquiler=="Días"?"selected":"" ?>>Días</option>
                <option value="Semanas" <?= $alquiler=="Semanas"?"selected":"" ?>>Semanas</option>
                <option value="Meses" <?= $alquiler=="Meses"?"selected":"" ?>>Meses</option>
            </select><br><br>

            <label>Adjuntar foto</label><br>
            <input type="file" name="foto" accept=".jpg,.png,.gif"><br><br>

            <input type="reset" name="limpiar" value="Limpiar">
            <input type="submit" name="validar" value="Validar">
            <input type="submit" name="enviar" value="Enviar" formaction="alumno_ok.php">

        </form>
    </body>
</html>

