<?php
    function potencia($n, $x){
       
        for($i = 0; $i <= $x; $i++){
            $pote = n *2;
            $vec[] = $pote;
        }
        return $vec;
    }

    $resultado = potencia(7, 10);

    foreach($resultado as $i => $v){
        echo "Potencia " . ($i+1) . " = $v <br>";
    }
?>