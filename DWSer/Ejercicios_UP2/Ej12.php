<?php
    function pedirTexto($mensaje) {
        echo $mensaje;
        return trim(fgets(STDIN));
    }

    function pedirNumero($mensaje) {
        echo $mensaje;
        return intval(trim(fgets(STDIN)));
    }

    function anadirLibro(&$biblioteca) {
        $titulo = pedirTexto("Título del libro: ");
        if (isset($biblioteca[$titulo])) {
            echo "El libro ya existe.\n";
            return;
        }
        $autor = pedirTexto("Autor: ");
        $anio = pedirNumero("Año de publicación: ");
        $biblioteca[$titulo] = ['autor' => $autor, 'anio' => $anio, 'prestado' => false];
        echo "Libro '$titulo' añadido.\n";
    }

    function listarLibros($biblioteca) {
        if (empty($biblioteca)) {
            echo "No hay libros.\n";
            return;
        }
        foreach ($biblioteca as $titulo => $libro) {
            $estado = $libro['prestado'] ? 'Prestado' : 'Disponible';
            echo "$titulo - Autor: {$libro['autor']}, Año: {$libro['anio']}, Estado: $estado\n";
        }
    }

    function prestarLibro(&$biblioteca) {
        $titulo = pedirTexto("Título del libro a prestar: ");
        if (!isset($biblioteca[$titulo])) {
            echo "Libro no encontrado.\n";
            return;
        }
        if ($biblioteca[$titulo]['prestado']) {
            echo "El libro ya está prestado.\n";
            return;
        }
        $biblioteca[$titulo]['prestado'] = true;
        echo "Libro '$titulo' prestado.\n";
    }

    function devolverLibro(&$biblioteca) {
        $titulo = pedirTexto("Título del libro a devolver: ");
        if (!isset($biblioteca[$titulo])) {
            echo "Libro no encontrado.\n";
            return;
        }
        if (!$biblioteca[$titulo]['prestado']) {
            echo "El libro no estaba prestado.\n";
            return;
        }
        $biblioteca[$titulo]['prestado'] = false;
        echo "Libro '$titulo' devuelto.\n";
    }

    function buscarPorAutor($biblioteca) {
        $autorBuscado = pedirTexto("Autor a buscar: ");
        $encontrados = false;
        foreach ($biblioteca as $titulo => $libro) {
            if (stripos($libro['autor'], $autorBuscado) !== false) {
                $estado = $libro['prestado'] ? 'Prestado' : 'Disponible';
                echo "$titulo - Año: {$libro['anio']}, Estado: $estado\n";
                $encontrados = true;
            }
        }
        if (!$encontrados) echo "No se encontraron libros de '$autorBuscado'.\n";
    }

    $biblioteca = [];

    do {
        echo "\n===== MENÚ BIBLIOTECA =====\n";
        echo "1. Añadir libro\n";
        echo "2. Listar libros\n";
        echo "3. Prestar libro\n";
        echo "4. Devolver libro\n";
        echo "5. Buscar libros por autor\n";
        echo "6. Salir\n";

        $op = pedirNumero("Elige una opción: ");

        switch ($op) {
            case 1: anadirLibro($biblioteca); break;
            case 2: listarLibros($biblioteca); break;
            case 3: prestarLibro($biblioteca); break;
            case 4: devolverLibro($biblioteca); break;
            case 5: buscarPorAutor($biblioteca); break;
            case 6: echo "Saliendo...\n"; exit;
            default: echo "Opción no válida.\n";
        }
    } while(true);
?>
