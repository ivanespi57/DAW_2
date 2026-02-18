<?php
/***
 * Formulario para registrar un aprendiz de Hogwarts
 * Requiere sesión para guardar los datos entre peticiones 
 * y un token CSRF para evitar ataques.
 * Se debe validar usando el fichero validaciones.php
 **/

/**
 * PROCESAR FORMULARIO
 */

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Comprobar token CSRF y finalizar si no es válido
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die("Token CSRF inválido");
    }

    // Si se pulsa VALIDAR
    if (isset($_POST['validar'])) {

        /**
         * VALIDACIONES y guardar valores en sesión
         */

        //nombre
        if (!validaRequerido($_POST['nombre'])) {
            $errores[] = "Nombre obligatorio";
        } else {
            $_SESSION['nombre'] = $_POST['nombre'];
        }

        //casa 
        if (!validaRequerido($_POST['casa'])) {
            $errores[] = "Casa obligatoria";
        } else {
            $_SESSION['casa'] = $_POST['casa'];
        }

        //varita
        $varitasPermitidas = [
            'Roble con núcleo de fénix',
            'Sauce con núcleo de unicornio',
            'Acebo con núcleo de dragón'
        ];

        if (!validaRequerido($_POST['varita']) || !in_array($_POST['varita'], $varitasPermitidas)) {
            $errores[] = "Varita obligatoria";
        } else {
            $_SESSION['varita'] = $_POST['varita'];
        }

        //asignaturas
        if (empty($_POST['asignaturas'])) {
            $errores[] = "Debe elegir asignaturas";
        } else {
            $_SESSION['asignaturas'] = implode(", ", $_POST['asignaturas']);
        }

        //nivel mágico
        if (!validaNumero($_POST['nivel']) || $_POST['nivel'] < 1 || $_POST['nivel'] > 100) {
            $errores[] = "Nivel inválido";
        } else {
            $_SESSION['nivel'] = $_POST['nivel'];
        }

        //foto

        //Si no hay foto en sesión, validamos la subida
        if (!isset($_SESSION['foto'])) {

            // Validar que se ha subido una foto
            if ($_FILES['foto']['error'] === 0) {

                // Validar extensiones y tamaño de la foto.
                $extensiones = ['jpg','jpeg','png'];
                $extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

                if (!in_array($extension, $extensiones)) {
                    $errores[] = "Extensión no permitida";
                }

                if ($_FILES['foto']['size'] > 2000000) {
                    $errores[] = "La foto supera 2MB";
                }

                //Si todo OK, guardar datos de la foto en sesión
                if (empty($errores)) {

                    /***
                     * GUARDAR LA FOTO EN EL SERVIDOR
                     */

                    // Crear nombre de carpeta con fecha y hora actual
                    $carpeta = "uploads_" . date("Ymd_His");

                    // Ruta completa dentro de public
                    $rutaCarpeta = $carpeta;

                    //Si no existe se crea la carpeta Uploads
                    if (!is_dir($rutaCarpeta)) {
                        mkdir($rutaCarpeta);
                    }

                    //Generamos el nombre final del archivo
                    // nombreAprendiz_timestamp.extensión es el formato final
                    $nombreFinal = $_SESSION['nombre'] . "_" . time() . "." . $extension;

                    // Mover el archivo subido a la carpeta uploads_fechaHora
                    move_uploaded_file($_FILES['foto']['tmp_name'], $rutaCarpeta . "/" . $nombreFinal);

                    // Guardar el nombre final en sesión
                    $_SESSION['foto'] = $carpeta . "/" . $nombreFinal;

                }

             //fin validación foto subida
            } else {
                $errores[] = "Debe subir una foto";
            }
         //fin foto en sesión
        }
     //fin botón validar
    }

    // Si se pulsa ENVIAR
    if (isset($_POST['enviar']) && empty($errores)) {
        
        /**
         * GUARDAR EN BASE DE DATOS
         * Los datos ya están validados y se guardan en sesión ($_SESSION)
         * Se redirige a resultado.php con el id del aprendiz
         */

        require_once __DIR__ . '/../controllers/AprendizController.php';

        $controller = new AprendizController();

        $id = $controller->guardar([
            'nombre' => $_SESSION['nombre'],
            'casa' => $_SESSION['casa'],
            'varita' => $_SESSION['varita'],
            'asignaturas' => $_SESSION['asignaturas'],
            'nivel' => $_SESSION['nivel'],
            'foto' => $_SESSION['foto']
        ]);

        header("Location: resultado.php?id=" . $id);
        exit;
    }
}
?>

<!-- FORMULARIO HTML, pon tu nombre con h1 -->
<h1>Registro Aprendiz Hogwarts - Iván Espí</h1>

<!-- El listado de errores si los hay -->
<?php
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
?>

<!-- completar las opciones necesarias del formulario -->
<form action="index.php" method="POST" enctype="multipart/form-data" >
    <!-- Campo oculto para el token CSRF -->
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    
    <!-- En cada campo debemos devolver los datos correctos 
        $_SESSION['nombre'] ?? '' Si no hay valor en la sesión devolvemos vacío para no devolver null -->
    <p><label>Nombre del aprendiz:</label>
    <input type="text" name="nombre" value="<?php echo $_SESSION['nombre'] ?? ''; ?>">
    </p>

    <p><label>Casa:</label>
    <select name="casa">
        <option value="">Seleccione</option>
        <option value="Gryffindor">Gryffindor</option>
        <option value="Slytherin">Slytherin</option>
        <option value="Hufflepuff">Hufflepuff</option>
        <option value="Ravenclaw">Ravenclaw</option>
    </select>
    </p>

  <p><label>Varita:</label>
    <select name="varita">
        <option value="">Seleccione</option>

        <option value="Roble con núcleo de fénix"
            <?php if (($_SESSION['varita'] ?? '') === 'Roble con núcleo de fénix') echo 'selected'; ?>>
            Roble con núcleo de fénix
        </option>

        <option value="Sauce con núcleo de unicornio"
            <?php if (($_SESSION['varita'] ?? '') === 'Sauce con núcleo de unicornio') echo 'selected'; ?>>
            Sauce con núcleo de unicornio
        </option>

        <option value="Acebo con núcleo de dragón"
            <?php if (($_SESSION['varita'] ?? '') === 'Acebo con núcleo de dragón') echo 'selected'; ?>>
            Acebo con núcleo de dragón
        </option>

    </select>
    </p>

   <p><label>Asignaturas favoritas:</label>
      <input type="checkbox" name="asignaturas[]" value="Defensa"> Defensa
      <input type="checkbox" name="asignaturas[]" value="Pociones"> Pociones
      <input type="checkbox" name="asignaturas[]" value="Encantamientos"> Encantamientos
    </p>

   <p><label>Nivel mágico (1-100):</label>
   <input type="number" name="nivel" value="<?php echo $_SESSION['nivel'] ?? ''; ?>">
    </p>

    <!-- Campo para subir la foto -->
    <!-- Si ya hay foto en sesión, no mostramos el campo de subida -->
    <?php if (!isset($_SESSION['foto'])) { ?>
    <p><label>Foto del aprendiz:</label>
    <input type="file" name="foto">
    </p>
    <?php } else {
        echo "<p>Foto subida: " . $_SESSION['foto'] . "</p>";
    } ?>

    <!-- Campo oculto para el tamaño máximo de la foto (2MB) -->
    <input type="hidden" name="tamano_maximo" value="2000000">

    <br><br>

    <!-- VALIDAR visible si:
         - NO es POST
         - O es POST con errores -->
    <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !empty($errores)) { ?>
        <button type="submit" name="validar">VALIDAR</button>
    <?php } ?>

    <!-- ENVIAR visible si:
         - ES POST
         - Y NO hay errores -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errores)) { ?>
        <button type="submit" name="enviar">ENVIAR</button>
    <?php } ?>
 
</form>
