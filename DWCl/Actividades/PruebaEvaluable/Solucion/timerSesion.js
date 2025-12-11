// ====================================================================
// 1. DECLARACIÓN DE VARIABLES Y ELEMENTOS GLOBALES
// ====================================================================

let idIntervalo = null;
let segundosRestantes = 0;
let enPausa = true; 

// Constantes para la lógica de alerta (segundos)
const UMBRAL_ALERTA = 3 * 60; // 3 minutos
const UMBRAL_CRITICO = 10; // 10 segundos

// Referencias a los elementos del DOM
const inputMinutos = document.getElementById('minutos-input');
const botonControl = document.getElementById('boton-control');
const contenedorTemporizador = document.getElementById('temporizador');
const displayTiempo = document.getElementById('tiempo');
const displayEstado = document.getElementById('estado');

// ====================================================================
// 2. FUNCIONES DE SETUP, DATOS Y FORMATO
// ====================================================================

/**
 * Función Externa de Formato: Convierte segundos totales a una cadena MM:SS.
 */
function formatearTiempo(totalSegundos) {
    const minutos = Math.floor(totalSegundos / 60);
    const segundos = totalSegundos % 60;

    const minFormateados = String(minutos).padStart(2, '0');
    const secFormateados = String(segundos).padStart(2, '0');

    return `${minFormateados}:${secFormateados}`;
}

/**
 * Función de Responsabilidad Única (Cálculo): Lee el input y establece segundosRestantes.
 */
function calcularTiempo() {
    const minutos = parseInt(inputMinutos.value);

    if (isNaN(minutos) || minutos < 1) {
        segundosRestantes = 15 * 60; 
    } else {
        segundosRestantes = minutos * 60;
    }
}

/**
 * Función de Responsabilidad Única (Interfaz): Limpia el DOM y establece el estado inicial.
 */
function resetearInterfaz() {
    contenedorTemporizador.classList.remove('alerta', 'finalizado');
    enPausa = true;
    inputMinutos.disabled = false;
    botonControl.textContent = 'Iniciar Sesión';
    displayEstado.textContent = '✅ Sesión Lista';

    actualizarTiempo();
}

// ====================================================================
// 3. FUNCIONES DE CONTROL DE MOTOR (BOM)
// ====================================================================

/**
 * Detiene el temporizador y actualiza la interfaz a "Reanudar".
 */
function pausarSesion() {
    clearInterval(idIntervalo);
    enPausa = true;
    botonControl.textContent = 'Reanudar Sesión';
    inputMinutos.disabled = false; 
    displayEstado.textContent = '⏸ Sesión Pausada';
}

/**
 * Inicia o reanuda el temporizador.
 */
function reanudarSesion() {
    idIntervalo = setInterval(actualizarTiempo, 1000);
    enPausa = false;
    botonControl.textContent = 'Pausar Sesión';
    inputMinutos.disabled = true; 
    displayEstado.textContent = '🏃 Sesión Activa';
}

// ====================================================================
// 4. EL MOTOR DEL RELOJ (BUCLE DE ACTUALIZACIÓN)
// ====================================================================

/**
 * La función principal que se ejecuta cada segundo.
 */
function actualizarTiempo() {
    // 4.1. DESCUENTO DE TIEMPO
    if (!enPausa && segundosRestantes > 0) {
        segundosRestantes--;
    }

    // 4.2. FORMATO MM:SS (Llama a la función externa)
    displayTiempo.textContent = formatearTiempo(segundosRestantes);

    // 4.3. LÓGICA CONDICIONAL MULTI-UMBRAL
    if (segundosRestantes > 0) {
        if (segundosRestantes <= UMBRAL_CRITICO) { 
            contenedorTemporizador.classList.add('finalizado'); 
            contenedorTemporizador.classList.remove('alerta');
            displayEstado.textContent = '🔴 ¡ALERTA CRÍTICA! 🔴';

        } else if (segundosRestantes <= UMBRAL_ALERTA) {
            contenedorTemporizador.classList.add('alerta');
            contenedorTemporizador.classList.remove('finalizado');
            displayEstado.textContent = '🟠 Alerta: ¡Tiempo cerca!';

        } else {
            // Estado Normal/Activo
            contenedorTemporizador.classList.remove('alerta', 'finalizado');
        }
    }

    // 4.4. DETENCIÓN FINAL
    if (segundosRestantes <= 0) {
        segundosRestantes = 0;
        clearInterval(idIntervalo);
        idIntervalo = null; 

        displayTiempo.textContent = formatearTiempo(0);
        
        contenedorTemporizador.classList.add('finalizado');
        botonControl.textContent = 'Reiniciar Sesión';
        displayEstado.textContent = '🏁 Sesión Finalizada';
        inputMinutos.disabled = false;
    }
}

// ====================================================================
// 5. EL DESPACHAD OR PRINCIPAL (`controlClick`)
// ====================================================================

/**
 * Función que maneja el click del botón, actuando como despachador de estados.
 */
function controlClick() {
    // Caso 1: REINICIAR SESIÓN (El tiempo ya es cero)
    if (segundosRestantes <= 0) {
        calcularTiempo();
        resetearInterfaz();
        return; 
    }

    // Caso 2: INICIAR o REANUDAR (Si está en pausa)
    if (enPausa) {
        // CORRECCIÓN DEL BUG: 
        // Solo llamamos a calcularTiempo() si el botón dice "Iniciar Sesión" (primer click).
        // Si dice "Reanudar Sesión", usamos el tiempo existente.

        if (botonControl.textContent === 'Iniciar Sesión') {
             calcularTiempo(); 
        }
        reanudarSesion();

    // Caso 3: PAUSAR (Si no está en pausa)
    } else {
        pausarSesion();
    }
}

// ====================================================================
// 6. INICIO DE LA APLICACIÓN
// ====================================================================

botonControl.addEventListener('click', controlClick);

calcularTiempo();
resetearInterfaz();