let porcentajeCarga = 0;
const barra = document.querySelector(".barraFront");
const completo = document.querySelector("h1");

const intervalo = setInterval(() => {

    porcentajeCarga += 1;
    barra.style.width = porcentajeCarga + "%";

    if (porcentajeCarga === 100){
        clearInterval(intervalo);
        barra.style.width = "100%";
        completo.textContent = "Carga completada"
    }
}, 50);