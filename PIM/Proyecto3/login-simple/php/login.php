<?php
session_start();
header("Content-Type: application/json");

ini_set('session.cookie_httponly',1);
ini_set('session.use_strict_mode',1);
ini_set('session.cookie_samesite','Strict');

$data = json_decode(file_get_contents("php://input"), true);

if(!$data || !isset($data['user'], $data['pass'])){
    echo json_encode(["success"=>false,"message"=>"Datos inválidos"]);
    exit;
}

$user = $data['user'];
$pass = $data['pass'];

try{
    $pdo = new PDO("mysql:host=localhost;dbname=login;charset=utf8mb4","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo json_encode(["success"=>false,"message"=>"Error DB"]);
    exit;
}

$stmt = $pdo->prepare("SELECT password FROM usuarios WHERE user=?");
$stmt->execute([$user]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$row){
    echo json_encode(["success"=>false,"message"=>"Usuario o contraseña incorrectos"]);
    exit;
}

if(password_verify($pass,$row['password'])){
    $_SESSION['autenticado'] = true;
    $_SESSION['user'] = $user;

    echo json_encode(["success"=>true]);
} else {
    echo json_encode(["success"=>false,"message"=>"Usuario o contraseña incorrectos"]);
}
