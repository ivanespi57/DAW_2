function empezar() {
    let formato = /^\d{2}\/\d{2}\/\d{4}$/;
    let f1 = null, f2 = null;

    let fecha1 = prompt("Introduce la primera fecha (dd/mm/aaaa):");
    while (true) {
        if (fecha1 === null) {
            console.log("Cancelado.");
            return;
        }

        if (!formato.test(fecha1)) {
            console.log("Formato incorrecto. Usa dd/mm/aaaa");
        } else {
            let [d, m, a] = fecha1.split("/").map(Number);
            f1 = new Date(a, m - 1, d);

            if (f1.getFullYear() === a && f1.getMonth() === m - 1 && f1.getDate() === d) {
                break;
            } else {
                console.log("Fecha no lógica, vuelve a intentarlo.");
            }
        }
        fecha1 = prompt("Introduce la primera fecha (dd/mm/aaaa):");
    }

    let fecha2 = prompt("Introduce la segunda fecha (dd/mm/aaaa):");
    while (true) {
        if (fecha2 === null) {
            console.log("Cancelado.");
            return;
        }

        if (!formato.test(fecha2)) {
            console.log("Formato incorrecto. Usa dd/mm/aaaa");
        } else {
            let [d2, m2, a2] = fecha2.split("/").map(Number);
            f2 = new Date(a2, m2 - 1, d2);

            if (f2.getFullYear() === a2 && f2.getMonth() === m2 - 1 && f2.getDate() === d2) {
                break;
            } else {
                console.log("Fecha no lógica, vuelve a intentarlo.");
            }
        }
        fecha2 = prompt("Introduce la segunda fecha (dd/mm/aaaa):");
    }

    let difMs = Math.abs(f1 - f2);
    let difDias = Math.floor(difMs / (1000 * 60 * 60 * 24));

    let fMenor = f1 < f2 ? f1 : f2;
    let fMayor = f1 > f2 ? f1 : f2;

    let anios = fMayor.getFullYear() - fMenor.getFullYear();
    let meses = fMayor.getMonth() - fMenor.getMonth();
    let dias = fMayor.getDate() - fMenor.getDate();

    if (dias < 0) {
        meses--;
        let mesAnterior = new Date(fMayor.getFullYear(), fMayor.getMonth(), 0);
        dias += mesAnterior.getDate();
    }

    if (meses < 0) {
        anios--;
        meses += 12;
    }

    let t1 = `${fMenor.getDate()}/${fMenor.getMonth() + 1}/${fMenor.getFullYear()}`;
    let t2 = `${fMayor.getDate()}/${fMayor.getMonth() + 1}/${fMayor.getFullYear()}`;

    console.log(`Entre ${t1} y ${t2} hay ${difDias} días:`);
    console.log(`${anios} años, ${meses} meses y ${dias} días`);
}
