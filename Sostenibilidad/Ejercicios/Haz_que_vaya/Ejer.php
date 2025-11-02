<?php

    $comunidades = [
        ["nombre" => "Paiporta", "poblacion" => 5000, "pozos" => 8, "acueducto" => true],
        ["nombre" => "Picanya", "poblacion" => 3000, "pozos" => 3, "acueducto" => false],
        ["nombre" => "Sedavi", "poblacion" => 7000, "pozos" => 12, "acueducto" => true],
    ];

    $calcularAcceso = function($comunidad) {
        $accesoBase = $comunidad["acueducto"] ? 0.9 : 0.4;
        $bonoPozos = $comunidad["pozos"] / $comunidad["poblacion"] * 1000;

        $acceso = $accesoBase + $bonoPozos;

        if ($acceso > 1) {
            $acceso = 1;
        }

        return $acceso;
    };

    $poblacionTotal = 0;
    $poblacionConAcceso = 0;

    foreach ($comunidades as $comunidad) {
        $poblacionTotal += $comunidad["poblacion"];
        $acceso = $calcularAcceso($comunidad);
        $poblacionConAcceso += $comunidad["poblacion"] * $acceso;
    }

    $porcentajeAcceso = ($poblacionConAcceso / $poblacionTotal) * 100;

    $porcentajeAcceso = round($porcentajeAcceso, 2);

    echo "Porcentaje real de acceso a agua potable: $porcentajeAcceso%";
?>
