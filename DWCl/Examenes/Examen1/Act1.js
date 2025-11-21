//función principal
function comprobarRequisitos() {

    let nombre, nivel, clase;
    let datosValidos = false;

    // funciones para validar
    function nombreValido(n) {
        return n !== null && n.trim() !== "";
    }

    function nivelValido(n) {
        return Number.isInteger(Number(n));
    }

    function claseValida(c) {
        return c === "Mago" || c === "Guerrero";
    }

    function esMagoElite(nivel) {
        return nivel > 35;
    }

    function esGuerreroElite(nivel) {
        return nivel > 40;
    }

    // bucle while
    while (!datosValidos) {
        //Pedir todo
        nombre = prompt("Introduce tu nombre:");
        nivel = parseInt(prompt("Introduce tu nivel:"));
        clase = prompt("Introduce tu clase (Mago o Guerrero):");

        // Validaciones básicas de entrada
        if (!nombreValido(nombre)) {
            alert("El nombre no puede estar vacío.");
            continue;
        }

        if (!nivelValido(nivel)) {
            alert("El nivel debe ser un número entero.");
            continue;
        }

        if (!claseValida(clase)) {
            alert("La clase debe ser Mago o Guerrero.");
            continue;
        }

        datosValidos = true;
    }

    if (clase === "Mago" && esMagoElite(nivel)) {
        alert("ACCESO CONCEDIDO. Eres un Mago ÉLITE.");
    }

    else if (clase === "Guerrero" && esGuerreroElite(nivel)) {
        alert("ACCESO CONCEDIDO. Eres un Guerrero ÉLITE.");
    }

    else {
        alert("ACCESO DENEGADO. Nivel insuficiente para misiones ÉLITE.");
    }
}
// Llamar a la función
comprobarRequisitos();
