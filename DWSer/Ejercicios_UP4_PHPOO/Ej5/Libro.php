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

    if (!interface_exists('Prestable')) {
        interface Prestable {
            public function estaPrestado();
            public function presta();
            public function devuelve();
        }
    }

    class Libro extends Publicacion implements Prestable {

        private $prestado = false;

        public function estaPrestado() {
            return $this->prestado;
        }

        public function presta() {
            if ($this->prestado) {
                echo "No se ha podido prestar, el libro '{$this->titulo}' ya está prestado.<br>\n";
            } else {
                $this->prestado = true;
                echo "Se ha prestado el libro '{$this->titulo}'.<br>\n";
            }
        }

        public function devuelve() {
            if ($this->prestado) {
                $this->prestado = false;
                echo "Se ha devuelto el libro '{$this->titulo}'.<br>\n";
            }
        }

        public function mostrarPrestado() {
            if ($this->prestado) {
                echo "El libro '{$this->titulo}' está prestado<br>\n";
            } else {
                echo "El libro '{$this->titulo}' no está prestado<br>\n";
            }
        }

        public function __toString() {
            $estado = ($this->prestado) ? "prestado" : "no prestado";
            return "ISBN: $this->isbn, título: $this->titulo, año de publicación: $this->anyo ($estado)<br>\n";
        }
    }
?>
