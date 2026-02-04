<?php

class Aprendiz {

    private $nombre;
    private $casa;
    private $varita;
    private $asignaturas;
    private $nivel;
    private $imagen;

    public function __construct(
        $nombre,
        $casa,
        $varita = [],
        $asignaturas = [],
        $nivel = null,
        $imagen = null
    ) {
        $this->nombre       = $nombre;
        $this->casa         = $casa;
        $this->varita       = $varita;
        $this->asignaturas  = $asignaturas;
        $this->nivel        = $nivel;
        $this->imagen       = $imagen;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCasa() {
        return $this->casa;
    }

    public function getVarita() {
        return $this->varita;
    }

    public function getAsignaturas() {
        return $this->asignaturas;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getImagen() {
        return $this->imagen;
    }
}
