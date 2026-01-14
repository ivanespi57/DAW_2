<?php

class Vehiculo {

    protected static $vehiculosCreados = 0;
    protected static $kilometrosTotales = 0;

    protected $kilometrosRecorridos;

    public function __construct() {
        self::$vehiculosCreados++;
        $this->kilometrosRecorridos = 0;
    }

    public function avanza($km) {
        $this->kilometrosRecorridos += $km;
        self::$kilometrosTotales += $km;
    }

    public function verKMRecorridos() {
        return "Kilómetros recorridos: $this->kilometrosRecorridos<br>\n";
    }

    public static function verKMTotales() {
        return "Kilómetros totales: " . self::$kilometrosTotales . "<br>\n";
    }

    public static function verVehiculosCreados() {
        return "Vehículos creados: " . self::$vehiculosCreados . "<br>\n";
    }
}

class Bicicleta extends Vehiculo {

    public function hacerCaballito() {
        echo "La bicicleta está haciendo el caballito<br>\n";
    }

    public function ponerCadena() {
        echo "La cadena de la bicicleta ha sido colocada<br>\n";
    }

    public function verKMRecorridos() {
        return "La bicicleta lleva recorridos $this->kilometrosRecorridos km<br>\n";
    }
}
?>
