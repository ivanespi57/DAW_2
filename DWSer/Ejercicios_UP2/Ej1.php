<?php
    function potencia($n, $x){
        
        $potencias = [];

        for($i = 0; $i <= $x; $i++){
            $potencias[] = pow($n,$i);
        }
        
    }
    potencia(7, 10);
    $suma = 0;

    foreach($potencias as $i => $v){
        echo "Potencia " . ($i+1) . " = $v <br>";
        $suma += $v;
    }

    echo "Suma de las potencias: $suma";

    
?>