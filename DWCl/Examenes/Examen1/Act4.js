// Variable global de daño base
let DANO_BASE = 45;

// Función de daño con multiplicador
function calcularDano(DANO_BASE, multiplicador = 3) {

    console.log(`DANO_BASE usado: ${DANO_BASE}`);
    console.log(`Multiplicador usado: ${multiplicador}`);

    return DANO_BASE * multiplicador;
}

let dano1 = calcularDano(DANO_BASE);
console.log(`Resultado Daño 1 (x3): ${dano1}`);

let dano2 = calcularDano(DANO_BASE, 5);
console.log(`Resultado Daño 2 (x5): ${dano2}`);
