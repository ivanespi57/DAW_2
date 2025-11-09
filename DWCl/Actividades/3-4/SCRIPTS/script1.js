function empezar(){

    let tipo;

    do{
        tipo = prompt("¿Quieres trabajar con letras ('L') o con números ('N')?");

        switch(tipo.toUpperCase()){
            case "L": 
                const abecedario = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                const conjuntoA = new Set();
                const conjuntoB = new Set();
        
                for (let i = 0; i <= 10; i++){
                    const posAleatoria = Math.floor(Math.random() * abecedario.length);
                    let letra = abecedario[posAleatoria];
                    conjuntoA.add(letra);
                }
                for (let i = 0; i <= 10; i++){
                    const posAleatoria = Math.floor(Math.random() * abecedario.length);
                    let letra = abecedario[posAleatoria];
                    conjuntoB.add(letra);
                }
                console.log(conjuntoA);
                console.log(conjuntoB);

                const unionLetras = new Set([...conjuntoA, ...conjuntoB]);

                console.log("La unión de los conjuntos es:");
                console.log(unionLetras);

                const interseccionLetras = new Set();

                for (const valor of conjuntoA){
                    if (conjuntoB.has(valor)){
                        interseccionLetras.add(valor);
                    }
                }

                console.log("Los elementos comunes de los conjuntos son:");
                console.log(interseccionLetras);

                const diferenciaLetras = new Set();

                for (const valor of conjuntoA){
                    if (!conjuntoB.has(valor)){
                        diferenciaLetras.add(valor);
                    }
                }

                console.log("Los elementos del primer conjunto que no están en el segundo son:");
                console.log(diferenciaLetras);

            break;
            case "N":
                    const conjunto1 = new Set();
                    const conjunto2 = new Set();

                    while (conjunto1.size < 10) {
                        const numero = Math.floor(Math.random() * 21); // del 0 al 20
                        conjunto1.add(numero);
                    }

                    while (conjunto2.size < 10) {
                        const numero = Math.floor(Math.random() * 21);
                        conjunto2.add(numero);
                    }
                    console.log(conjunto1);
                    console.log(conjunto2);

                    const unionNumeros = new Set([...conjunto1, ...conjunto2]);

                    console.log("La unión de los conjuntos es:");
                    console.log(unionNumeros);

                    const interseccionNumeros = new Set();

                    for (const valor of conjunto1){
                        if (conjunto2.has(valor)){
                            interseccionNumeros.add(valor);
                        }
                    }

                    console.log("Los elementos comunes de los conjuntos son:");
                    console.log(interseccionNumeros);

                    const diferenciaNumeros = new Set();

                    for (const valor of conjunto1){
                        if (!conjunto2.has(valor)){
                            diferenciaNumeros.add(valor);
                        }
                    }

                    console.log("Los elementos del primer conjunto que no están en el segundo son:");
                    console.log(diferenciaNumeros);
                break;
            
            default: 
                alert("El programa no hará nada");
        }
    }while(tipo.toUpperCase() !== "L" && tipo.toUpperCase() !== "N");
}
