// Pedimos todo
let nombre = prompt("Introduce tu nombre");
let nivel = parseInt(prompt("Introduce el nivel"));
let clase = prompt("Introduce tu clase (Mago o Guerrero)");
let si = false;
// Función principal
function comprobarRequisitos(){
    //Función que comprueba si el campo esta vacio
    function noEstaVacio(nombre) {

        return nombre !== "" && nombre !== null && nombre !== undefined;

    }
    //Función que comprueba si la variable es un entero
    function esEntero(nivel) {
        return Number.isInteger(Number(nivel));

    }
    //Función que comprueba si has introducido bien la clase
    function claseBien(clase){
        if(clase === "Mago" || clase === "Guerrero"){
            return si =  true;
        }else{
            alert("La clase solo puede ser Mago o Guerrero")
            return;
        }
    }
    //Función que comprueba si la clase coincide con su nivel mínimo
    function nivelClase(clase, nivel){
        
        if(clase === "Mago" && nivel < 35){
            alert("Si eres Mago tu nivel debe de ser mayor a 35")
            return;
        }

        if(clase === "Guerrero" && nivel < 40){
            alert("Si eres Guerrero, tu nivel tiene que ser mayor a 40");
            return;
        }
    }
    //Llamamos a las funciones
    noEstaVacio(nombre);
    esEntero(nivel);
    claseBien(clase);
    nivelClase(clase,nivel);
}
comprobarRequisitos();