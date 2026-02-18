<?php
session_start();

require_once __DIR__ . '/../validaciones.php';
require_once __DIR__ . '/../models/Aprendiz.php';

function limpiarSesionFormulario(): void {
    unset($_SESSION['datos_form'], $_SESSION['errores'], $_SESSION['aprendiz']);
}

class AprendizController {

    public function procesar() {
        $accion = $_POST['accion'] ?? '';

        switch ($accion) {

            case 'limpiar':
                limpiarSesionFormulario();
                header('Location: ../../public/index.php');
                exit;

            case 'validar':
                $errores = validarFormulario($_POST);
                $_SESSION['errores'] = $errores;
                $_SESSION['datos_form'] = $_POST;
                header('Location: ../../public/index.php');
                exit;

            case 'enviar':
            default:
                $errores = validarFormulario($_POST);

                if (!empty($errores)) {
                    $_SESSION['errores'] = $errores;
                    $_SESSION['datos_form'] = $_POST;
                    header('Location: ../../public/index.php');
                    exit;
                }

                // Subir imagen
                $rutaFoto = null;
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                    $uploadsDir = __DIR__ . '/../../public/uploads/';
                    if (!file_exists($uploadsDir)) mkdir($uploadsDir, 0777, true);

                    $nombreFinal = "aprendiz_" . time();
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadsDir . $nombreFinal);
                    $rutaFoto = 'uploads/' . $nombreFinal;
                }

                $aprendiz = new Aprendiz(
                    $_POST['nombre'],
                    $_POST['casa'],
                    $_POST['varita'] ?? [],
                    $_POST['asigna'] ?? [],
                    $_POST['nivel'],
                    $rutaFoto
                );

                $_SESSION['aprendiz'] = $aprendiz;
                unset($_SESSION['errores']);
                header('Location: ../../public/resultado.php');
                exit;
        }
    }
}
