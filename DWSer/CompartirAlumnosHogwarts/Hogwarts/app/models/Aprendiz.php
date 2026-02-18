<?php
require_once __DIR__ . '/../Database.php';

class Aprendiz {
    /**
     * Clase modelo para representar un aprendiz de Hogwarts
     * Atributos: nombre, casa, varita, asignaturas, nivel, foto
     * Métodos: __construct, guardar()
    */

    private $nombre;
    private $casa;
    private $varita;
    private $asignaturas;
    private $nivel;
    private $foto;

    public function __construct($datos) {
    /**
    * Inicializa un nuevo aprendiz con los datos proporcionados
    */
        $this->nombre = $datos['nombre'];
        $this->casa = $datos['casa'];
        $this->varita = $datos['varita'];
        $this->asignaturas = $datos['asignaturas'];
        $this->nivel = $datos['nivel'];
        $this->foto = $datos['foto'];
    }

    public function guardar() {
    /**
     * Guarda el aprendiz en la base de datos
     * Devuelve el ID del aprendiz insertado
     */

        $database = new Database();
        $conexion = $database->conectar();

        $sql = "INSERT INTO aprendices (nombre, casa, varita, asignaturas, nivel, foto)
                VALUES (:nombre, :casa, :varita, :asignaturas, :nivel, :foto)";

        $stmt = $conexion->prepare($sql);

        $stmt->execute([
            ':nombre' => $this->nombre,
            ':casa' => $this->casa,
            ':varita' => $this->varita,
            ':asignaturas' => $this->asignaturas,
            ':nivel' => $this->nivel,
            ':foto' => $this->foto
        ]);

        return $conexion->lastInsertId();
    }

}
