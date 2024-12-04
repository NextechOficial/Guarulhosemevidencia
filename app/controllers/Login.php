<?php
session_start();

require_once "../models/Usuario.php";
header('Content-Type: application/json');

$servername = "144.217.39.54";
$username = "hostdeprojetos";
$password = "ifspgru@2022";
$databasename = "hostdeprojetos_guarulhosemevidencias";


$conn = new mysqli($servername, $username, $password, $databasename);
if (!$conn) {
    $response = ["success" => false, "message" => "Erro ao conectar com o banco de dados"];
    echo json_encode($response);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $User = new Usuario($conn);
    $response = $User->verificarUsuario($email, $senha);
    $_SESSION["usuario"] = "ativo";
    if ($_SESSION["usuario"]) {
        
        echo json_encode($response);
    }




    // if ($response["success"] || $response.usuario !== ""){

    //     echo json_encode($response);
    // }else{
    //     echo json_encode($response);
    // }
}

