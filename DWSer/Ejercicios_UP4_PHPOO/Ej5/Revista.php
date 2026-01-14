<?php

    if (!class_exists('Publicacion')) {
        abstract class Publicacion {

            protected $isbn;
            protected $titulo;
            protected $anyo;

            public function __construct($isbn, $titulo, $anyo = 2024) {
                $this->isbn = $isbn;
                $this->titulo = $titulo;
                $this->anyo = $anyo;
            }

            abstract public function __toString();
        }
    }

    class Revista extends Publicacion {

        private $num;

        public function __construct($isbn, $titulo, $anyo, $num) {
            parent::__construct($isbn, $titulo, $anyo);
            $this->num = $num;
        }

        public function __toString() {
            return "ISBN: $this->isbn, título: $this->titulo, año de publicación: $this->anyo, número: $this->num<br>\n";
        }
    }
?>
