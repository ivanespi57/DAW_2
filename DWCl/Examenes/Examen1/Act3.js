//Creamos la clase padre Personaje
class Personaje {
    //Creamos un contador de personajes
    static contadorPersonajes = 0;
    //Creamos su constructor
    constructor(nombre, clase, vida) {
        Personaje.contadorPersonajes++;
        this._idPersonaje = Personaje.contadorPersonajes;
        this._nombre = nombre;
        this._clase = clase;
        this._vida = vida;
    }
    //Creamos los getters y setters
    get idPersonaje() {
        return this._idPersonaje;
    }

    get nombre() {
        return this._nombre;
    }

    get clase() {
        return this._clase;
    }

    get vida() {
        return this._vida;
    }

    set nombre(nuevoNombre) {
        this._nombre = nuevoNombre;
    }

    set clase(nuevoClase) {
        this._Clase = nuevoClase;
    }

    set vida(nuevaVida) {
        this._vida = nuevaVida;
    }
    //Mostramos la información 
    toString() {
        return `Id Personaje: ${this._idPersonaje} | Nombre: ${this._nombre} | Clase: ${this._clase} | Vida: ${this._vida}`;
    }
}
//Creamos la clase hija Guerrero que hereda de Personaje
class Guerrero extends Personaje {
    //Creamos el contador de Guerreros
    static contadorGuerreros = 0;
    //Creamos su constructor
    constructor(nombre, clase, vida, fuerza) {
        super(nombre, clase, vida);
        Guerrero.contadorGuerreros++;
        this._idGuerrero = Guerrero.contadorGuerreros;
        this._fuerza = fuerza;
    }
    //Creamos los getters y setters
    get idGuerrero() {
        return this._idGuerrero;
    }

    get fuerza() {
        return this._fuerza;
    }

    set fuerza(nuevoFuerza) {
        this._fuerza = nuevoFuerza;
    }
    //Mostramos la información, hasta la heredada
    toString() {
        return super.toString() + ` | Fuerza: ${this._fuerza}`;
    }
}
//Creamos los Personajes
let p1 = new  Personaje("Elara", "Mago", 90); 
let p2 = new Personaje("Lúthien", "Arquero", 75);
//Creamos los Guerreros
let g1 = new Guerrero("Balthus", "Guerrero", 120, 85);
let g2 = new Guerrero("Kael", "Guerrero", 110, 95);

console.log("--- 2 Personajes (Base) ---");
// Muestra por consola los personajes creados con la clase base personaje
console.log(p1.toString());
console.log(p2.toString());
// Muestra por consola los guerreros creados con la clase hija guerrero
console.log("--- 2 Guerreros (Hija) ---");
console.log(g1.toString());
console.log(g2.toString());
