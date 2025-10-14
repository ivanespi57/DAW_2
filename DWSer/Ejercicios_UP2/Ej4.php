<?php
    function llenarArray($n) {
        for ($i = 0; $i < $n; $i++) {
            $a[$i] = rand(0, 100);
        }
        return $a;
    }

    function mostrarArrays($nums, $cuad, $cub) {
        echo "<b>Número&nbsp;&nbsp;&nbsp;Cuadrado&nbsp;&nbsp;&nbsp;Cubo</b><br>";
        for ($i = 0; $i < count($nums); $i++) {
            echo $nums[$i] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $cuad[$i] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $cub[$i] . "<br>";
        }
    }

    $numero = llenarArray(20);

    for ($i = 0; $i < 20; $i++) {
        $cuadrado[$i] = $numero[$i] ** 2;
        $cubo[$i] = $numero[$i] ** 3;
    }

    mostrarArrays($numero, $cuadrado, $cubo);
?>
