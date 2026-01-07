<?php
    class Incidencia{
        private static $contador = 0;
        private static $pend = 0;
        private $cod;
        private $puesto;
        private $desc;
        private $est;
        private $sol;

        public function __construct($puesto, $desc){
            self::$contador++;
            self::$pend++;
            
            $this->cod = self::$contador;
            $this->puesto = $puesto;
            $this->desc = $desc;
            $this->est = "Pendiente";
            $this->sol = ""; 
        }

        public function resuelve($sol){
            $this->est = "Resuelta";
            $this->sol = $sol;
            self::$pend--;
        }

        public static function getPendientes(){
            return self::$pend;
        }

        public function __toString(){
            $txt = "Incidencia " . $this->cod . " - Puesto: " . $this->puesto . " - " . $this->desc . " - " . $this->est;
            
            if($this->est == "Resuelta"){
                $txt .= " - " . $this->sol;
            }
            return $txt . "<br>";
        }
    }
?>  