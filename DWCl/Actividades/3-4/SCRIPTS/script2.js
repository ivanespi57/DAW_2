function empezar() {

    // Pido el rango de números
    let minimo = parseInt(prompt("Introduce el número mínimo del rango:"));
    let maximo = parseInt(prompt("Introduce el número máximo del rango:"));

    // Verificaciones del rango
    if (isNaN(minimo) || isNaN(maximo)) {
        console.log("Debes introducir números válidos.");
        return;
    }
    if (minimo >= maximo) {
        console.log("El número mínimo debe ser menor que el máximo.");
        return;
    }

    // Pido número de repeticiones
    let repeticiones = parseInt(prompt("Introduce el número de repeticiones:"));

    // Verifico repeticiones
    if (isNaN(repeticiones) || repeticiones <= 0) {
        console.log("El número de repeticiones debe ser un entero positivo.");
        return;
    }

    // Creo un objeto para contar repeticiones
    let conteo = {};
    for (let i = minimo; i <= maximo; i++) {
        conteo[i] = 0;
    }

    // Generar números aleatorios y contar sus repeticiones
    for (let i = 0; i < repeticiones; i++) {
        let num = Math.floor(Math.random() * (maximo - minimo + 1)) + minimo;
        conteo[num]++;
    }

    // Mostrar resultados
    console.log("\nRepeticiones de salida de cada número:");
    console.log(`Muestra: Números aleatorios del ${minimo} al ${maximo} con ${repeticiones} repeticiones\n`);

    for (let numero in conteo) {
        console.log(`Número ${numero}: ${conteo[numero]}`);
    }

}
