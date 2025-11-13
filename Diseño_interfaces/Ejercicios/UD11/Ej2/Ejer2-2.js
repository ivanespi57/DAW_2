let contador = 0;
const num = document.getElementById("numero");
const sum = document.getElementById("sumar");
const res = document.getElementById("restar");
const reset = document.getElementById("reset");

function actuContador(){
    num.innerText = contador;
}

sum.addEventListener("click", function(){
    contador++;
    actuContador();
});

res.addEventListener("click", function(){
    if(contador > 0){
        contador--;
        actuContador();
    }
});

reset.addEventListener("click", function(){
    contador = 0;
    actuContador();
});