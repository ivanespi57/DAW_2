function genArrays() {
    let nums = [];
    for (let i = 0; i < 20; i++) {
        nums[i] = Math.floor(Math.random() * 11);
    }
    console.log("Array inicial:", nums);

    let pares = [];
    let imp = [];
    for (let i = 0; i < nums.length; i++) {
        if (nums[i] % 2 === 0) {
            pares.push(nums[i]);
        } else {
            imp.push(nums[i]);
        }
    }
    console.log("Array PARES:", pares);
    console.log("Array IMPARES:", imp);

    let paresMed = [];
    for (let i = 1; i < pares.length - 1; i++) {
        paresMed.push(pares[i]);
    }

    let impMed = [];
    let mid = Math.floor(imp.length / 2);
    for (let i = 0; i < imp.length; i++) {
        if (imp.length % 2 === 0) {
            if (i !== mid && i !== mid - 1) impMed.push(imp[i]);
        } else {
            if (i !== mid) impMed.push(imp[i]);
        }
    }

    console.log("Array PARES sin extremos:", paresMed);
    console.log("Array IMPARES sin centro:", impMed);

    let sumaP = 0;
    for (let i = 0; i < paresMed.length; i++) sumaP += paresMed[i];
    paresMed.push(sumaP);

    let sumaI = 0;
    for (let i = 0; i < impMed.length; i++) sumaI += impMed[i];
    impMed.push(sumaI);

    console.log("Array PARES con suma:", paresMed);
    console.log("Array IMPARES con suma:", impMed);

    let medP = Math.floor(sumaP / (paresMed.length - 1));
    let medI = Math.floor(sumaI / (impMed.length - 1));

    paresMed.unshift(medP);
    impMed.unshift(medI);

    console.log("Array PARES con media al inicio:", paresMed);
    console.log("Array IMPARES con media al inicio:", impMed);

    let paresMul = [];
    let impMul = [];
    for (let i = 0; i < paresMed.length; i++) paresMul.push(Math.floor(paresMed[i] * paresMed[0]));
    for (let i = 0; i < impMed.length; i++) impMul.push(Math.floor(impMed[i] * impMed[0]));

    console.log("Array PARES multiplicados:", paresMul);
    console.log("Array IMPARES multiplicados:", impMul);

    let comb = [];
    for (let i = 0; i < paresMul.length; i++) comb.push(paresMul[i]);
    for (let i = 0; i < impMul.length; i++) comb.push(impMul[i]);

    for (let i = 0; i < comb.length - 1; i++) {
        for (let j = 0; j < comb.length - 1 - i; j++) {
            if (comb[j] > comb[j + 1]) {
                let temp = comb[j];
                comb[j] = comb[j + 1];
                comb[j + 1] = temp;
            }
        }
    }

    console.log("Array FINAL ORDENADO:", comb);

    let sinRep = [];
    for (let i = 0; i < comb.length; i++) {
        let rep = false;
        for (let j = 0; j < sinRep.length; j++) {
            if (comb[i] === sinRep[j]) {
                rep = true;
                break;
            }
        }
        if (!rep) sinRep.push(comb[i]);
    }

    console.log("Array FINAL SIN REPETIDOS:", sinRep);
}
