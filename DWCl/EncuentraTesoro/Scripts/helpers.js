function getRandomNumber(size){
    return Math.floor(Math.random() * size);
}

function getDistance(e, target){
    let diffX = e.offsetX - target.x
    let diffY = e.offsetY - target.y

    return Math.sqrt((diffX * diffX) + (diffY * diffY));
}

function getDistanceHint(distance){
    if(distance < 30){
        return "Te estás quemando!";
    }else if(distance < 40){
        return "Bastante caliente";
    }else if(distance < 60){
        return "Caliente";
    }else if(distance < 100){
        return "Templado";
    } else if(distance < 180){
        return "Frío";
    }else if(distance < 320){
        return "Bastante frío";
    }else{
        return "Te estás congelando";
    }
}