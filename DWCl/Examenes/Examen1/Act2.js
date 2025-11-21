const inventario = {

    _pesoMinimo: 5,
    _pesoMaximo: 20,
    _objetos: [],

    get capacidadDisponible() {
        let capacidad = [];
        for (let i = this._pesoMinimo; i <= this._pesoMaximo; i++) {
            capacidad.push(i);
        }
        return capacidad;
    },

    set cargarObjetos(nuevosObjetos) {
        // Añade sin sobrescribir
        this._objetos.push(...nuevosObjetos);
    }
};

// Muestra la capacidad disponible
console.log(`Capacidad Disponible: `, inventario.capacidadDisponible);

// Añade 3 objetos con el setter
inventario.cargarObjetos = ["Espada Épica", "Poción de Vida", "Mapa Antiguo"];

// Muestra los objetos del inventario
console.log(`Objetos en Inventario: `, inventario._objetos);
