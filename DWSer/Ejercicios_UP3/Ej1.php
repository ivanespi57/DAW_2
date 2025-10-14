<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iván Espí Asins</title>
</head>
<body>
    <h1>Iván Espí Asins</h1>
    <hr>
    <h2>Conversor de euros y pesetas</h2>
    <form action="convertir.php">
        <label for="imp">Importe</label>
        <input type="number" name="importe">
        <br>

        <input type="radio" name="convertir" value="eurpes"> Convertir de Euros a Pesetas <br>
        <input type="radio" name="convertir" value="peseur"> Convertir de Peseta a Euros <br>

        <input type="submit" name="submit" value="conversion">
    </form>
</body>
</html>