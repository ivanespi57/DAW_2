<?php
    function pedirTexto($mensaje) {
        echo $mensaje;
        return trim(fgets(STDIN));
    }

    function crearMenu($nombre = "principal") {
        $numOpciones = intval(pedirTexto("Introduce el número de opciones del menú $nombre: "));
        $tipo = pedirTexto("¿Quieres usar números o letras para las opciones del menú $nombre?: ");

        $menu = [];
        for ($i = 1; $i <= $numOpciones; $i++) {
            $texto = pedirTexto("Texto para la opción $i: ");
            if ($tipo == 'n') $clave = (string)$i;
            else $clave = chr(64 + $i); 

            $sub = pedirTexto("¿Quieres que la opción '$texto' tenga submenú? (s/n): ");
            if (strtolower($sub) == 's') {
                $menu[$clave] = ['texto' => $texto, 'submenu' => crearMenu("submenú de $texto")];
            } else {
                $menu[$clave] = ['texto' => $texto, 'submenu' => null];
            }
        }

        $fin = pedirTexto("Introduce el carácter para salir del menú $nombre: ");
        $menu[$fin] = ['texto' => 'Salir', 'submenu' => null];

        return $menu;
    }

    function mostrarMenu($menu) {
        foreach ($menu as $clave => $opcion) {
            echo "$clave. " . $opcion['texto'] . "\n";
        }
    }

    function ejecutarMenu($menu, $nombre = "principal") {
        do {
            echo "\n===== MENÚ $nombre =====\n";
            mostrarMenu($menu);
            $op = pedirTexto("Elige una opción: ");

            if (!isset($menu[strtoupper($op)])) {
                echo "Opción no válida.\n";
                continue;
            }

            $seleccion = $menu[strtoupper($op)];
            if ($seleccion['texto'] == 'Salir') {
                echo "Saliendo del menú $nombre...\n";
                break;
            }

            echo "Has elegido la opción '$seleccion[texto]' del menú $nombre.\n";

            if ($seleccion['submenu'] !== null) {
                ejecutarMenu($seleccion['submenu'], "submenú de $seleccion[texto]");
            }
        } while (true);
    }

    $menuPrincipal = crearMenu("principal");
    ejecutarMenu($menuPrincipal);
?>
