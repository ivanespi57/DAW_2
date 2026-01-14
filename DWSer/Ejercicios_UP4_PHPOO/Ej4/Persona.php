<?php

    trait DNITrait {

        public function generarDNI() {
            $numero = rand(10000000, 99999999);
            $resto = $numero % 23;
            return $numero . $this->generaLetraDNI($resto);
        }

        private function generaLetraDNI($idLetra) {
            $letras = array(
                'T','R','W','A','G','M','Y','F','P','D','X','B',
                'N','J','Z','S','Q','V','H','L','C','K','E'
            );
            return $letras[$idLetra];
        }
    }

    class Persona {

        use DNITrait;

        const INFRAPESO  = -1;
        const PESO_IDEAL = 0;
        const SOBREPESO  = 1;

        private $nom;
        private $edad;
        private $dni;
        private $sexo;
        private $peso;
        private $alt;

        public function __construct() {
            $this->nom = "";
            $this->edad = 0;
            $this->sexo = "H";
            $this->peso = 0;
            $this->alt = 0;
            $this->dni = $this->generarDNI();
        }

        public static function consNomEdSex($nom, $edad, $sexo) {
            $p = new Persona();
            $p->nom = $nom;
            $p->edad = $edad;
            $p->setSexo($sexo);
            return $p;
        }

        public static function consFull($nom, $edad, $sexo, $peso, $alt) {
            $p = new Persona();
            $p->nom = $nom;
            $p->edad = $edad;
            $p->setSexo($sexo);
            $p->peso = $peso;
            $p->alt = $alt;
            return $p;
        }

        public function setNombre($nom) {
            $this->nom = $nom;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }

        public function setSexo($sexo) {
            $this->sexo = $this->comprobarSexo($sexo);
        }

        public function setPeso($peso) {
            $this->peso = $peso;
        }

        public function setAltura($alt) {
            $this->alt = $alt;
        }

        private function comprobarSexo($sexo) {
            if ($sexo == 'H' || $sexo == 'M') {
                return $sexo;
            }
            return 'H';
        }

        public function calcularIMC() {
            if ($this->alt <= 0) {
                return self::PESO_IDEAL;
            }

            $imc = $this->peso / ($this->alt * $this->alt);

            if ($imc < 20) {
                return self::INFRAPESO;
            } elseif ($imc <= 25) {
                return self::PESO_IDEAL;
            } else {
                return self::SOBREPESO;
            }
        }

        public function strIMC() {
            $resultado = $this->calcularIMC();

            if ($resultado == self::INFRAPESO) {
                return $this->nom . " está por debajo de su peso ideal<br>\n";
            } elseif ($resultado == self::PESO_IDEAL) {
                return $this->nom . " está en su peso ideal<br>\n";
            } else {
                return $this->nom . " tiene sobrepeso<br>\n";
            }
        }

        public function mostrarIMC() {
            return $this->strIMC();
        }

        public function esMayorDeEdad() {
            if ($this->edad >= 18) {
                echo $this->nom . " con DNI $this->dni es mayor de edad<br>\n";
            } else {
                echo $this->nom . " con DNI $this->dni es menor de edad<br>\n";
            }
        }

        public function __toString() {
            $sexoTexto = ($this->sexo == 'H') ? "Hombre" : "Mujer";

            return "Informacion de la persona:<br>\n" .
                "DNI: $this->dni<br>\n" .
                " Nombre: $this->nom<br>\n" .
                " Sexo: $sexoTexto<br>\n" .
                " Edad: $this->edad<br>\n" .
                " Peso: $this->peso Kg<br>\n" .
                " Altura: $this->alt metros<br>\n" .
                " Resultado IMC: " . $this->strIMC();
        }
    }
?>
