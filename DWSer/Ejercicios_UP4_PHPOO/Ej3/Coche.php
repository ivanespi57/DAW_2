<?php
    include_once "Bicicleta.php";

    class Coche extends Vehiculo {

        public function llenarDeposito() {
            return "Depósito del coche lleno<br>\n";
        }

        public function quemaRueda() {
            echo "El coche está quemando rueda<br>\n";
        }

        public function verKMRecorridos() {
            return "El coche lleva recorridos $this->kilometrosRecorridos km<br>\n";
        }
    }
?>
