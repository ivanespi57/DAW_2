<?php
    class Terminal{
        public $num;
        public $tiempo;    
        public $tarifa;

    }

    class Movil extends Terminal{
        public function __construct($num, $tarifa) {
            $this->num = $num;
            $this->tarifa = $tarifa;
        }
        public function llama($terminal, $segundosDeLlamada){
            
        }
    }
?>