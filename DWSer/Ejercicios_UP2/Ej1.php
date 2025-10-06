<?php
function potencias($n, $x) {
    $potencias = [];

    for ($i = 1; $i <= $x; $i++) {
        $potencias[] = pow($n, $i);
    }

    $suma = 0;
    foreach ($potencias as $i => $v) {
        echo "Potencias " . ($i + 1) . " = $v<br>";
        $suma += $v;
    }

    echo "Suma de todas las potencias: $suma";
}

potencias(3, 6);
?>