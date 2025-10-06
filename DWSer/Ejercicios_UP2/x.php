<?php
function potencias($numero, $exponente) {
    $potencias = [];

    for ($i = 1; $i <= $exponente; $i++) {
        $potencias[] = pow($numero, $i);
    }

    $suma = 0;
    foreach ($potencias as $i => $valor) {
        echo "$numero^" . ($i + 1) . " = $valor<br>";
        $suma += $valor;
    }

    echo "Suma de todas las potencias: $suma";
}

potencias(2, 4);
?>