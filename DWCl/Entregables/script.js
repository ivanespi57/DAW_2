
const n1 = 10;
const n2 = 4;
let n3 = 3;
let suma = n1 + n2 + n3;
let x = false;

if (suma > 10) x = true;

document.getElementById("num1Display").innerHTML = n1;
document.getElementById("num2Display").innerHTML = n2;
document.getElementById("num3Display").innerHTML = n3;
document.getElementById("resultDisplay").innerHTML = suma;
document.getElementById("isOverTen").innerHTML = x;