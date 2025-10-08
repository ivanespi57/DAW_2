<?php
    function salarioMax($trabaj) {
        return max($trabaj);
    }

    function salarioMin($trabaj): mixed {
        return min($trabaj);
    }

    function salarioMed($trabaj) {
        return array_sum($trabaj) / count($trabaj);
    }

    $trabaj = [];
    $num = (int) readline("¿Cuántos trabajadores quieres poner? ");

    for ($i = 0; $i < $num; $i++) {
        $nom = readline("Nombre " . ($i + 1));
        $sal = (float) readline("Salario de $nom: ");
        $trabaj[$nom] = $sal;
    }

    echo "\n SALARIOS INICIALES \n";
    foreach ($trabaj as $nom => $sal) {
        echo "$nom: $sal €\n";
    }

    echo "Máximo: " . salarioMax($trabaj) . " €\n";
    echo "Mínimo: " . salarioMin($trabaj) . " €\n";
    echo "Salario medio: " . salarioMed($trabaj) . " €\n";

    $incremento = (float) readline("\nIntroduce el incremento en porcentaje (%): ");

    foreach ($trabaj as $nom => $sal) {
        $trabaj[$nom] = $sal + ($sal * $incremento / 100);
    }

    echo "\n SALARIOS TRAS EL INCREMENTO \n";
    foreach ($trabaj as $nom => $sal) {
        echo "$nom: $sal €\n";
    }

    echo "Máximo: " . salarioMax($trabaj) . " €\n";
    echo "Mínimo: " . salarioMin($trabaj) . " €\n";
    echo "Salario medio: " . salarioMed($trabaj) . " €\n";
?>
