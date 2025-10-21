<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Calcular salarios0</h2>

    <form method="post">
        
        <label>Primer trabajador:</label>
        <input type="number" name="trabaj1"><br>

        <label>Segundo trabajador:</label>
        <input type="number" name="trabaj2"><br>

        <label>Tercer trabajador:</label>
        <input type="number" name="trabaj3"><br>

        <label>Cuarto trabajador:</label>
        <input type="number" name="trabaj4"><br>

        <input type="submit" value="Calcular">
    </form>

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
</body>
</html>
