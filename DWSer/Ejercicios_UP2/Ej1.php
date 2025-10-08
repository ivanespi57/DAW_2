<?php
    function potencias($n, $x) {
        $potencias = [];

        for ($i = 1; $i <= $x; $i++) {
            $potencias[] = pow($n, $i);
        }

        $suma = 0;
        foreach ($potencias as $i => $v) {
            echo "Potencia " . ($i + 1) . " = $v\n";
            $suma += $v;
        }

        echo "Suma de todas las potencias: $suma\n";
    }

    $n = (int) readline("Introduce un número: ");
    $x = (int) readline("Introduce un exponente: ");

    potencias($n, $x);
?>
