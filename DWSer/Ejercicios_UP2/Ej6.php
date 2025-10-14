<?php
    function crearMatriz($f, $c) {
        for ($i = 0; $i < $f; $i++) {
            for ($j = 0; $j < $c; $j++) {
            $m[$i][$j] = rand(1, 9);
            }
        }
        return $m;
    }

    function mostrar($m) {
        foreach ($m as $fila) {
            echo implode(" ", $fila) . "<br>";
        }
    }

    function operaMatriz($m1, $m2, $op) {
        for ($i = 0; $i < count($m1); $i++) {
            for ($j = 0; $j < count($m1[0]); $j++) {
            if ($op == 's') $r[$i][$j] = $m1[$i][$j] + $m2[$i][$j];
            if ($op == 'r') $r[$i][$j] = $m1[$i][$j] - $m2[$i][$j];
            if ($op == 'm') $r[$i][$j] = $m1[$i][$j] * $m2[$i][$j];
            if ($op == 'd') $r[$i][$j] = round($m1[$i][$j] / $m2[$i][$j], 2);
            }
        }

        echo "<b>Matriz 1:</b><br>"; mostrar($m1);
        echo "<b><br>Matriz 2:</b><br>"; mostrar($m2);
        echo "<b><br>Resultado:</b><br>"; mostrar($r);
    }

    $m1 = crearMatriz(3, 3);
    $m2 = crearMatriz(3, 3);
    operaMatriz($m1, $m2, 's');
?>
