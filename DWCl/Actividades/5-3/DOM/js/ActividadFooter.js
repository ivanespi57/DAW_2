document.addEventListener("DOMContentLoaded", function () {

    const btn = document.querySelector(".btn-flotante");
    const foo = document.querySelector(".footer");

    let abierto = false;

    btn.addEventListener("click", function (e) {
        e.preventDefault();

        if (!abierto) {
            // Que se vea el footer
            foo.classList.add("activo");
            btn.classList.add("activo");
            btn.textContent = "XCerrar";

            abierto = true;
        } else {
            // Que no se vea el footer
            foo.classList.remove("activo");
            btn.classList.remove("activo");
            btn.textContent = "Descubre más....";

            abierto = false;
        }
    });

});
