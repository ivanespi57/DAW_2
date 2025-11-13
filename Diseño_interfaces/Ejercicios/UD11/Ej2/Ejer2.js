const botSal = document.getElementById("saludar");
const mens = document.getElementById("mensaje");

botSal.addEventListener("click", function(){
    mens.innerText = "Hola!";

    mens.style.color = "green";

    setTimeout( function(){
        mens.innerText = "";
        mens.style.color = "";
    }, 2000);
});