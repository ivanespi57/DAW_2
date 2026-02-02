document.addEventListener("DOMContentLoaded", () => {
    form.addEventListener("submit", buscarImagenes);
});

const form = document.getElementById("formulario");
const res = document.getElementById("resultado");
const pag = document.getElementById("paginacion");
const term = document.getElementById("termino");

const regPag = 40;
let totalPag;
let it;
let pagAct = 1;

async function buscarImagenes(e) {
    e.preventDefault();

    const termino = term.value;

    if (termino === ""){
        alert("Debes introducir un término de busqueda");
        return;
    }

    pagAct = 1;
    await consultarAPI();
}

async function consultarAPI() {
    const key = "54484889-07b00b6e660dc2cefcfaa403f";
    const termino = term.value;

    const url = `https://pixabay.com/api/?key=${key}&q=${termino}&per_page=${regPag}&page=${pagAct}`;

    try{
        const resp = await fetch(url);
        const datos = await resp.json();

        totalPag = calcularPaginas(datos.totalHits);

        mostrarImagenes(datos.hits);

    }catch (error){
        alert("Error al consultar la API")
    }
}

// mostrar imágenes
function mostrarImagenes(img){

    limpiarHTML(res);
    limpiarHTML(pag);

    img.forEach(imagen => {

        const { previewURL, likes, views, largeImageURL } = imagen;

        res.innerHTML += `
            <div class="w-1/2 md:w-1/3 lg:w-1/4 mb-4 p-3">
                <div class="bg-white">
                    <img src="${previewURL}" class="w-full">

                    <div class="p-4">
                        <p class="font-bold">${likes}
                            <span class="font-light"> Likes</span>
                        </p>

                        <p class="font-bold">${views}
                            <span class="font-light"> Views</span>
                        </p>

                        <a href="${largeImageURL}" target="_blank"
                        class="block w-full bg-blue-800 hover:bg-blue-500 text-white uppercase font-bold text-center rounded mt-5 p-1">
                            Ver Imagen
                        </a>
                    </div>
                </div>
            </div>
        `;
    });

    imprimirPag();
}

function* crearPaginador(total){
    for(let i = 1; i <= total; i++){
        yield i;
    }
}

function imprimirPag(){

    it = crearPaginador(totalPag);

    while(true){

        const {value, done} = it.next();
        if(done) return;

        const btn = document.createElement("a");
        btn.textContent = value;
        btn.href = "#";
        btn.classList.add("siguiente","bg-yellow-400","px-4","py-1","mr-2","font-bold","mb-4","rounded");

        btn.onclick = () => {
            pagAct = value;
            consultarAPI();
        };

        pag.appendChild(btn);
    }
}

function calcularPaginas(total){
    return Math.ceil(total / regPag);
}

function limpiarHTML(div){
    div.innerHTML = "";
}
