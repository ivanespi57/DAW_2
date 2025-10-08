<?php
    function permut($vec) {
        $num = count($vec);
        for ($i = 0; $i < $num / 2; $i++) {
            $aux = $vec[$i];
            $vec[$i] = $vec[$num - 1 - $i];
            $vec[$num - 1 - $i] = $aux;
        }
        return $vec;
    }

    $n = (int) readline("¿Cuántos elementos tiene el vector? ");

    $vector = [];
    for ($i = 0; $i < $n; $i++) {
        $vector[$i] = (int) readline("Introduce el elemento $i: ");
    }

    $res = permut($vector);

    echo "\nVector permutado:\n";
    print_r($res);
?>
