<?php
    function validaRequerido($valor){ //Obliga a introducir datos en campos requeridos
        if(trim($valor) == ''){
            return false;
        }else{
            return true;
        }
    }

    function validaEmail($valor){ //valida que se haya introducido un email user@ejemplo.com
        if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
            return false;
        }else{
            return true;
        }
    }

    function validaAlfabeto ($valor){
        if (ctype_alpha($valor)===FALSE){
            return false;
        }else{
            return true;
        }
    }

    function validaAlfanum ($valor){
        if (ctype_alnum($valor)===FALSE){
            return false;
        }else{
            return true;
        }
    }

    function validaNumero ($valor){
        if (ctype_digit($valor)===FALSE){
            return false;
        }else{
            return true;
        }
    }


    function validarFormulario($datos) {
        $errores = [];

        // Nombre requerido 
        if (!isset($datos['nombre']) || trim($datos['nombre']) === '') {
            $errores[] = "El nombre es obligatorio.";
        }

        // Casa requerida
        if (!isset($datos['casa']) || trim($datos['casa']) === '') {
            $errores[] = "Debes seleccionar una casa.";
        }

        // Nivel requerido y entre 1 y 100
        if (!isset($datos['nivel']) || trim($datos['nivel']) === '') {
            $errores[] = "El nivel mágico es obligatorio.";
        } elseif (!ctype_digit($datos['nivel']) || (int)$datos['nivel'] < 1 || (int)$datos['nivel'] > 100) {
            $errores[] = "El nivel mágico debe ser un número entre 1 y 100.";
        }

        // Varita
        if (!isset($datos['varita']) || !is_array($datos['varita']) || count($datos['varita']) === 0) {
            $errores[] = "Debes seleccionar al menos una varita.";
        }

        // Asignaturas
        if (!isset($datos['asigna']) || !is_array($datos['asigna']) || count($datos['asigna']) === 0) {
            $errores[] = "Debes seleccionar al menos una asignatura.";
        }

        return $errores;
    }



?>