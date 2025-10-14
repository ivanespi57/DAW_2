function esPrimo(num) {
    if (num <= 1) return false;
    for (let i = 2; i <= Math.sqrt(num); i++) {
        if (num % i === 0) return false;
    }
    return true;
}

function comprobarPrimos(event) {
    event.preventDefault();

    let numero = parseInt(document.getElementById("numeroPrimo").value);
    let opcion = document.querySelector('input[name="opcion"]:checked').value;

    if (isNaN(numero) || numero < 1) {
        alert("Introduce un número válido mayor que 0.");
        return;
    }

    if (opcion === "1") {
        // Comprobar si el número es primo
        let resultado = esPrimo(numero)
            ? `El número ${numero} es primo`
            : `El número ${numero} NO es primo`;
        document.getElementById("res5").textContent = resultado;

    } else if (opcion === "2") {

        let primos = [];
        for (let i = 1; i <= numero; i++) {
            if (esPrimo(i)) primos.push(i);
        }
        console.log("Primos encontrados:", primos);
        document.getElementById("res5").textContent = 
            `Se han encontrado ${primos.length} números primos.`;
    }
}
