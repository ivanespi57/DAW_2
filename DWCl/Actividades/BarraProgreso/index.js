let porcentajeCarga = 0;
const barra = document.querySelector(".barraFront");
const completo = document.querySelector("h1");
const cont = document.querySelector(".contador");

const intervalo = setInterval(() => {

    porcentajeCarga += 1;
    barra.style.width = porcentajeCarga + "%";
    cont.textContent = porcentajeCarga + "%";

    if (porcentajeCarga === 100){
        clearInterval(intervalo);
        barra.style.width = "100%";
        completo.textContent = "Carga completada"
    }

    if(porcentajeCarga > 80){
        barra.classList.add("alerta-final");
    }

}, 50);