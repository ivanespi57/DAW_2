document.addEventListener("DOMContentLoaded", () => {

    const combo = document.querySelector(".combo");
    const lista = document.querySelector(".forma_pago");
    const texto = combo.querySelector("p");
    const opciones = document.querySelectorAll(".forma_pago li");

    combo.addEventListener("click", () => {
        lista.classList.toggle("oculto");
        combo.classList.toggle("gira");
    });

    opciones.forEach(opcion => {
        opcion.addEventListener("click", () => {
            texto.textContent = opcion.querySelector("p").textContent;
            lista.classList.add("oculto");
            combo.classList.remove("gira");
        });
    });

});
