let numeroSecreto = Math.floor(Math.random() * 11);
let intentos = 0;

function adivinarNumero(event) {
    event.preventDefault();

    let input = document.getElementById("intento").value;

    if (input === "") {
        if (!confirm("No has introducido número. ¿Quieres seguir jugando?")) {
            document.getElementById("res4").textContent = "Juego terminado.";
            return;
        }
    }

    let intento = parseInt(input);
    if (isNaN(intento) || intento < 0 || intento > 10) {
        alert("Tienes que introducir un número válido entre 0 y 10.");
        return;
    }

    intentos++;
    document.getElementById("res4").textContent = `Intentos: ${intentos}`;

    if (intento === numeroSecreto) {
        alert(`Has acertado el número ${numeroSecreto} en ${intentos} intentos.`);
        if (confirm("¿Quieres volver a jugar?")) {
            numeroSecreto = Math.floor(Math.random() * 11);
            intentos = 0;
            document.getElementById("res4").textContent = "Intentos: 0";
        }
    } else if (intento < numeroSecreto) {
        alert("El número secreto es mayor.");
    } else {
        alert("El número secreto es menor.");
    }
}
