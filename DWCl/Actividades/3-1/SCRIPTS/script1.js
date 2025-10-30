function interNumeros(){
    
    let min = parseInt(prompt("Introduce el valor mínimo:"));
    let max = parseInt(prompt("Introduce el valor máximo:"));

    if(isNaN(min) || isNaN(max) || max < min || min > max){
        alert("Valores inválidos")
    }

    let inter = {
        
        minimo: min,
        maximo: max,

        get dentro() {
            let x = [];

            for(let i = this.minimo; i <= this.maximo; i++){
                x.push(i);
            }
            return x;
        },

        set aleatorio(numeros) {
            this.minimo = Math.min(...numeros);
            this.maximo = Math.max(...numeros);
        }
    }
    console.log(inter.dentro);

    let numal = [];
    for(let i = 0; i <= 5; i++){
        numal.push(Math.floor(Math.random() * 100) + 1);
    }

    console.log("Intervalo:");
    console.log("Array: ", inter.dentro);
    console.log("Mínimo: ", inter.minimo);
    console.log("Máximo: ", inter.maximo);
    console.log("Aleatorios:");
    console.log("Array: ", inter.alea = numal);
    console.log("Mínimo: ", inter.minimo);
    console.log("Máximo: ", inter.maximo);
}