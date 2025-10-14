<?php

    echo "Introduce el número de opciones del menú: ";
    $opciones = intval(trim(fgets(STDIN)));

    echo "¿Quieres usar números (n) o letras (l) para las opciones?: ";
    $tipo = trim(fgets(STDIN));

    for ($i = 1; $i <= $opciones; $i++) {
        echo "Texto para la opción $i: ";
        $texto[$i] = trim(fgets(STDIN));
    }

    echo "Introduce el carácter para salir (por ejemplo 'x'): ";
    $fin = trim(fgets(STDIN));

    do {
        echo "\n===== MENÚ =====\n";
        for ($i = 1; $i <= $opciones; $i++) {
            if ($tipo == 'n') {
                echo "$i. " . $texto[$i] . "\n";
            } else {
                $letra = chr(64 + $i);
                echo "$letra. " . $texto[$i] . "\n";
            }
        }
        echo "$fin. Salir\n";
        echo "Elige una opción: ";
        $op = trim(fgets(STDIN));

        if ($op == $fin) {
            echo "Saliendo...\n";
            break;
        }

        if ($tipo == 'n' && is_numeric($op) && $op >= 1 && $op <= $opciones) {
            echo "Has elegido la opción $op: " . $texto[$op] . "\n";
        } elseif ($tipo == 'l') {
            $num = ord(strtoupper($op)) - 64;
            
            if ($num >= 1 && $num <= $opciones) {
                echo "Has elegido la opción $op: " . $texto[$num] . "\n";
            } else {
                echo "Opción inválida.\n";
            }
        } else {
            echo "Opción inválida.\n";
        }

    } while (true);
?>
