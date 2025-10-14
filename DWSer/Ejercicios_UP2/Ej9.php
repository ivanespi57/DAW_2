<?php
    function pedirTexto($mensaje) {
        echo $mensaje;
        return trim(fgets(STDIN));
    }

    function pedirNumero($mensaje) {
        echo $mensaje;
        return intval(trim(fgets(STDIN)));
    }

    function crearMenuAsociativo() {
        $numOpciones = pedirNumero("Introduce el número de opciones del menú: ");
        $tipo = pedirTexto("¿Quieres usar números o letras para las opciones?: ");

        $menu = [];

        for ($i = 1; $i <= $numOpciones; $i++) {
            $texto = pedirTexto("Texto para la opción $i: ");

            if ($tipo == 'n') {
                $clave = (string)$i;
            } else {
                $clave = chr(64 + $i);
            }
            $menu[$clave] = $texto;
        }

        $fin = pedirTexto("Introduce el carácter para salir: ");
        $menu[$fin] = "Salir";

        return [$menu, $fin];
    }

    function mostrarMenu($menu) {
        echo "\n===== MENÚ =====\n";
        foreach ($menu as $clave => $texto) {
            echo "$clave. $texto\n";
        }
    }

    function ejecutarMenu($menu, $fin) {
        do {
            mostrarMenu($menu);
            $op = pedirTexto("Elige una opción: ");

            if ($op == $fin) {
                echo "Saliendo...\n";
                break;
            }

            if (array_key_exists(strtoupper($op), $menu)) {
                echo "Has elegido la opción $op: " . $menu[strtoupper($op)] . "\n";
            } else {
                echo "Opción inválida.\n";
            }
        } while (true);
    }

    list($menu, $fin) = crearMenuAsociativo();
    ejecutarMenu($menu, $fin);
?>
