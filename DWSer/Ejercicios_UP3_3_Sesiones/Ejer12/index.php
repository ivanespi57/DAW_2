<?php
    session_start();

    $errores = [];
    $nombre = "";
    $apellidos = "";
    $edad = "";
    $peso = "";
    $sexo = "";
    $aficio = [];
    $civil = "";
    $otroEstado = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = trim($_POST["nombre"] ?? "");
        $apellidos = trim($_POST["apellidos"] ?? "");
        $edad = trim($_POST["edad"] ?? "");
        $peso = trim($_POST["peso"] ?? "");
        $sexo = $_POST["sexo"] ?? "";
        $aficio = $_POST["aficio"] ?? [];
        $civil = $_POST["civil"] ?? "";
        $otroEstado = trim($_POST["otroEst"] ?? "");

        if (!is_array($aficio)) $aficio = [];

        if (empty($nombre)) $errores["nombre"] = "El nombre es obligatorio.";
        if (empty($apellidos)) $errores["apellidos"] = "Los apellidos son obligatorios.";
        if (empty($edad)) $errores["edad"] = "Introduce una edad válida.";
        if (empty($peso)) $errores["peso"] = "Introduce tu peso.";
        if (empty($sexo)) $errores["sexo"] = "Selecciona tu sexo.";
        if (empty($civil)) $errores["civil"] = "Selecciona tu estado civil.";
        if (empty($aficio)) $errores["aficio"] = "Selecciona al menos una afición.";

        if (isset($_POST["enviar"]) && empty($errores)) {

            $_SESSION["datos"] = [
                "nombre"     => $nombre,
                "apellidos"  => $apellidos,
                "edad"       => $edad,
                "peso"       => $peso,
                "sexo"       => $sexo,
                "aficio"     => $aficio,
                "civil"      => $civil,
                "otroEst"    => $otroEstado
            ];

            header("Location: Ej10.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Iván Espí Asins</title>
        <style>
            label { font-weight: bold; }
            span { color: red; }
        </style>
    </head>
    <body>
    <h1>Iván Espí Asins</h1>
    <h2>Formulario de recogida de datos</h2>

    <form method="POST" action="index.php">

        <label>Nombre</label><br>
        <input type="text" name="nombre" value="<?=$nombre?>" size="25"><br>
        <span><?= $errores["nombre"] ?? "" ?></span><br><br>

        <label>Apellidos</label><br>
        <input type="text" name="apellidos" value="<?=$apellidos?>" size="25"><br>
        <span><?= $errores["apellidos"] ?? "" ?></span><br><br>

        <label>Edad</label><br>
        <input type="number" name="edad" value="<?=$edad?>"><br>
        <span><?= $errores["edad"] ?? "" ?></span><br><br>

        <label>Peso</label><br>
        <input type="number" name="peso" min="10" max="150" value="<?=$peso?>"><br>
        <span><?= $errores["peso"] ?? "" ?></span><br><br>

        <label>Sexo</label><br>
        <select name="sexo">
            <option value="">Seleccione...</option>
            <option value="Hombre" <?= $sexo=="Hombre"?"selected":"" ?>>Hombre</option>
            <option value="Mujer" <?= $sexo=="Mujer"?"selected":"" ?>>Mujer</option>
        </select><br>
        <span><?= $errores["sexo"] ?? "" ?></span><br><br>

        <label>Estado Civil</label><br>
        <input type="radio" name="civil" value="Divorciado" <?= $civil=="Divorciado"?"checked":"" ?>> Divorciado<br>
        <input type="radio" name="civil" value="Soltero" <?= $civil=="Soltero"?"checked":"" ?>> Soltero<br>
        <input type="radio" name="civil" value="Casado" <?= $civil=="Casado"?"checked":"" ?>> Casado<br>
        <input type="radio" name="civil" value="Viudo" <?= $civil=="Viudo"?"checked":"" ?>> Viudo<br>
        <input type="radio" name="civil" value="Otros" <?= $civil=="Otros"?"checked":"" ?>> Otros:
        <input type="text" name="otroEst" value="<?=$otroEstado?>" placeholder="Escribe aquí..."><br>
        <span><?= $errores["civil"] ?? "" ?></span><br><br>

        <label>Aficiones</label><br>
        <input type="checkbox" name="aficio[]" value="Cine" <?= in_array("Cine",$aficio)?"checked":"" ?>> Cine<br>
        <input type="checkbox" name="aficio[]" value="Deporte" <?= in_array("Deporte",$aficio)?"checked":"" ?>> Deporte<br>
        <input type="checkbox" name="aficio[]" value="Literatura" <?= in_array("Literatura",$aficio)?"checked":"" ?>> Literatura<br>
        <input type="checkbox" name="aficio[]" value="Música" <?= in_array("Música",$aficio)?"checked":"" ?>> Música<br>
        <input type="checkbox" name="aficio[]" value="Cómics" <?= in_array("Cómics",$aficio)?"checked":"" ?>> Cómics<br>
        <input type="checkbox" name="aficio[]" value="Series" <?= in_array("Series",$aficio)?"checked":"" ?>> Series<br>
        <input type="checkbox" name="aficio[]" value="Videojuegos" <?= in_array("Videojuegos",$aficio)?"checked":"" ?>> Videojuegos<br>
        <span><?= $errores["aficio"] ?? "" ?></span><br><br>

        <input type="submit" name="validar" value="Validar">
        <input type="submit" name="enviar" value="Enviar">

    </form>

    </body>
</html>
