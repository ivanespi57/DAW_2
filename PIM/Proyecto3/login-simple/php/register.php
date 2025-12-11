<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if(!$data || !isset($data['user'],$data['pass'])){
    echo json_encode(["success"=>false,"message"=>"Datos inválidos"]);
    exit;
}

$user = trim($data['user']);
$pass = trim($data['pass']);

if($user==="" || $pass===""){
    echo json_encode(["success"=>false,"message"=>"Rellena todos los campos"]);
    exit;
}

try{
    $pdo = new PDO("mysql:host=localhost;dbname=login;charset=utf8mb4","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo json_encode(["success"=>false,"message"=>"Error DB"]);
    exit;
}

// comprobar si existe
$stmt = $pdo->prepare("SELECT user FROM usuarios WHERE user=? LIMIT 1");
$stmt->execute([$user]);

if($stmt->rowCount()>0){
    echo json_encode(["success"=>false,"message"=>"Ese usuario ya existe"]);
    exit;
}

// generar código único base-36
function codigoBase36(){
    $ref = time();
    $digits = str_split("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $base = count($digits);
    $out = "";
    while($ref > 0){
        $out .= $digits[$ref % $base];
        $ref = floor($ref / $base);
    }
    return strrev($out);
}

$codigo = codigoBase36();

// insertar usuario
$hash = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO usuarios (user,password,codigo) VALUES (?,?,?)");
$stmt->execute([$user, $hash, $codigo]);

echo json_encode(["success"=>true]);
