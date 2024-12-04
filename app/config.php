<?php
// Ativa a exibição de erros para ajudar na depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
$servername = "144.217.39.54";
$username = "hostdeprojetos";
$password = "ifspgru@2022";
$databasename = "hostdeprojetos_guarulhosemevidencias";

$conn = new mysqli($servername, $username, $password, $databasename);

// Verificando a conexão
if ($conn->connect_error) {
    // Se houver erro na conexão, exibe a mensagem e encerra
    $response = ["success" => false, "message" => "Erro ao conectar com o banco de dados: " . $conn->connect_error];
    echo json_encode($response);  // Enviar resposta em formato JSON
    exit;
} else {
    $response = ["success" => true, "message" => "Conexão bem-sucedida"];
    echo json_encode($response);  // Enviar resposta em formato JSON
}
?>