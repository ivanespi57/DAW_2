<?php
    function crearMatriz($t) {
        for ($i = 0; $i < $t; $i++) {
            for ($j = 0; $j < $t; $j++) {
            $m[$i][$j] = $i + $j;
            }
        }
        return $m;
    }

    function mostrarMatriz($m) {
        $t = count($m);
        echo "<table border='1' cellpadding='5'>";

        for ($i = 0; $i < $t; $i++) {
            $sumaFila = 0;
            echo "<tr>";
            for ($j = 0; $j < $t; $j++) {
            echo "<td>".$m[$i][$j]."</td>";
            $sumaFila += $m[$i][$j];
            }
            echo "<td><b>$sumaFila</b></td>";
            echo "</tr>";
        }

        echo "<tr>";
        for ($j = 0; $j < $t; $j++) {
            $sumaCol = 0;
            for ($i = 0; $i < $t; $i++) {
            $sumaCol += $m[$i][$j];
            }
            echo "<td><b>$sumaCol</b></td>";
        }
        echo "<td><b>-</b></td>";
        echo "</tr>";

        echo "</table>";
    }

    $matriz = crearMatriz(5);
    mostrarMatriz($matriz);
?>
