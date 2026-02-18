<?php
require_once __DIR__ . '/../models/Aprendiz.php';

class AprendizController {

    public function guardar($datosFormulario) {
        /***
         * Crear una instancia del modelo Aprendiz 
         * y guardar el aprendiz en la base de datos
         */

        $aprendiz = new Aprendiz($datosFormulario);
        return $aprendiz->guardar();
    }
}
