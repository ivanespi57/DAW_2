<?php

    class Terminal {

        protected $num;
        protected $tiempo;

        public function __construct($num) {
            $this->num = $num;
            $this->tiempo = 0;
        }

        public function llama($terminal, $segundos) {
            $this->tiempo += $segundos;
            $terminal->tiempo += $segundos;
        }

        protected function formatoTiempo($segundos) {
            $min = intdiv($segundos, 60);
            $seg = $segundos % 60;
            return "$min m y $seg s";
        }

        public function __toString() {
            return "Nº $this->num – " .
                $this->formatoTiempo($this->tiempo) .
                " de conversación en total";
        }
    }


    class Movil extends Terminal {

        private $tarifa;
        private $importe;
        private $tiempoTarificado;

        public function __construct($num, $tarifa) {
            parent::__construct($num);
            $this->tarifa = $tarifa;
            $this->importe = 0;
            $this->tiempoTarificado = 0;
        }

        public function llama($terminal, $segundosDeLlamada) {

            parent::llama($terminal, $segundosDeLlamada);

            $this->tiempoTarificado += $segundosDeLlamada;

            switch ($this->tarifa) {
                case "rata":
                    $costeMin = 0.06;
                    break;
                case "mono":
                    $costeMin = 0.12;
                    break;
                case "bisonte":
                    $costeMin = 0.30;
                    break;
            }

            $this->importe += ($segundosDeLlamada / 60) * $costeMin;
        }

        public function __toString() {
            $total = $this->formatoTiempo($this->tiempo);
            $tarifado = $this->formatoTiempo($this->tiempoTarificado);
            $importe = round($this->importe, 2);

            return "Nº $this->num – $total de conversación en total - tarificados $tarifado por un importe de $importe euros";
        }
    }
?>
