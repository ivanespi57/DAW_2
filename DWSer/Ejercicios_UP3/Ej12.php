<?php
    function codigoPostal($codPost){
        if (preg_match("/^(03|12|46)[0-9]{3}$/", $codPost)) {
            echo "'$codPost' es un código postal válido de la Comunidad Valenciana";
        }else{
            echo "'$codPost' no es un código postal válido de la Comunidad Valenciana";
        }
    }

    function NIF($nif){
        if(preg_match("/^\d{8}-[A-Za-z]$/", $nif)){
            echo "'$nif' es un NIF válido";
        }else{
            echo "'$nif' no es un NIF válido";
        }
    }

    function fecha($fec){
        if(preg_match("/^(0[0-9]|[12][0-9]|3[01])[\/-](0[0-9]|1[02])[\/-](19|20\d{2})$/", $fec)){
            echo "'$fec' es una fecha válida";
        }else{
            echo "'$fec' no es una fecha válida";
        }
    }

    function cadena($cad){
        if(preg_match("/enviado/i", $cad)){
            echo "Si está la cadena 'enviado'";
        }else{
            echo "No está la cadena 'enviado'";
        }
    }

    function mayusMinusEsp($cad){
        if(preg_match("/^[A-Za-z\s]+$/", $cad)){
            echo "'$cad' es un texto válido";
        }else{
            echo "'$cad' no es un texto válido";
        }
    }

    function numerosSinEsp($num){
        if(preg_match("/^[0-9]+$/", $num)){
            echo "'$num' es una cadena válida";
        }else{
            echo "'$num' no es una cadena válida";
        }
    }

    function numerosConEsp($num){
        if(preg_match("/^[0-9\s]+$/", $num)){
            echo "'$num' es una cadena válida";
        }else{
            echo "'$num' no es una cadena válida";
        }
    }
    function conCasiTodo($cad){
        if(preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü0-9\s]+$/", $cad)){
            echo "'$cad' es una cadena válida";
        }else{
            echo "'$cad' no es una cadena válida";
        }
    }
    function conTodo($cad){
        if(preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü0-9\s\'.,;:\-]+$/", $cad)){
            echo "'$cad' es una cadena válida";
        }else{
            echo "'$cad' no es una cadena válida";
        }
    }

    function email($email){
        if(preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)){
            echo "'$email' es un email válida";
        }else{
            echo "'$email' no es un email válida";
        }
    }

    function validarURL($url) {
        if (preg_match('/^https?:\/\/www\.[a-zA-Z0-9\-]+\.[a-z]{2,6}(\/[a-zA-Z0-9\-?=&%]*)?$/', $url)) {
            echo "URL válida";
        } else {
            echo "URL inválida";
        }
    }

    function contraseña($pass){
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/', $pass)) {
            echo "'$pass' es una contraseña válida";
        } else {
            echo "'$pass' no es una contraseña válida";
        }
    }

    function IPv4($ip) {

        if (preg_match('/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $ip)) {
            echo "'$ip' es válida";
        } else {
            echo "'$ip' no es válida" ;
        }
    }

    function MAC($mac) {

    if (preg_match('/^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$/', $mac)) {
        echo "'$mac' es una MAC válida";
    } else {
        echo "'$mac' no es una MAC válida";
    }
}

?>