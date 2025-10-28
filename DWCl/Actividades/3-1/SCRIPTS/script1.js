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
        
    }


    intervalo.nuevosValores = aleatorios;
}