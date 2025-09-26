const WIDHT = 400;
const HEIGH = 400;

let target = {
    x: getRandomNumber(WIDHT),
    y: getRandomNumber(HEIGH)
};

let $map = document.getElementById('map');
let $distance = document.getElementById('distance');
let clicks = 0;

$map.addEventListener('click', function (e){
    clicks++;
    let distance = getDistance(e, target);
    let distanceHint = getDistanceHint(distance);
    
    $distance.innerHTML = `<h1>${distanceHint}</h1>`;

    if(distance < 20){
        alert(`Has encontrado el tesoro en ${clicks} clicks`);
        location.reload;
    }
});