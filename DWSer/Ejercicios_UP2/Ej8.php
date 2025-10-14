<?php
    function pedirNumero($mensaje) {
        echo $mensaje;
        return intval(trim(fgets(STDIN)));
    }

    function pedirTexto($mensaje) {
        echo $mensaje;
        return trim(fgets(STDIN));
    }

    function crearMenu() {
        $numOpciones = pedirNumero("Introduce el número de opciones del menú: ");
        $tipo = pedirTexto("¿Quieres usar números o letras para las opciones?: ");

        for ($i = 1; $i <= $numOpciones; $i++) {
            $texto[$i] = pedirTexto("Texto para la opción $i: ");
        }

        $fin = pedirTexto("Introduce el carácter para salir: ");

        return [$numOpciones, $tipo, $texto, $fin];
    }

    function mostrarMenu($numOpciones, $tipo, $texto, $fin) {
        echo "\n===== MENÚ =====\n";
        
        for ($i = 1; $i <= $numOpciones; $i++) {
            if ($tipo == 'n') {
                echo "$i. " . $texto[$i] . "\n";
            } else {
                $letra = chr(64 + $i);
                echo "$letra. " . $texto[$i] . "\n";
            }
        }
        echo "$fin. Salir\n";
    }

    function ejecutarMenu($numOpciones, $tipo, $texto, $fin) {
        do {
            mostrarMenu($numOpciones, $tipo, $texto, $fin);
            $op = pedirTexto("Elige una opción: ");

            if ($op == $fin) {
            echo "Saliendo...\n";
            break;
            }

            if ($tipo == 'n' && is_numeric($op) && $op >= 1 && $op <= $numOpciones) {
                echo "Has elegido la opción $op: " . $texto[$op] . "\n";
            } elseif ($tipo == 'l') {
                $num = ord(strtoupper($op)) - 64;

            if ($num >= 1 && $num <= $numOpciones) {
                echo "Has elegido la opción $op: " . $texto[$num] . "\n";
            } else {
                echo "Opción inválida.\n";
            }
            } else {
                echo "Opción inválida.\n";
            }
        } while (true);
    }

    list($numOpciones, $tipo, $texto, $fin) = crearMenu();
    ejecutarMenu($numOpciones, $tipo, $texto, $fin);
    ?>
