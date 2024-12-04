<?php
header('Content-Type: application/json');

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
$servername = "144.217.39.54";
$username = "hostdeprojetos";
$password = "ifspgru@2022";
$databasename = "hostdeprojetos_guarulhosemevidencias";

$conn = new mysqli($servername, $username, $password, $databasename);
// Conexão com o banco de dados
if (!$conn) {
    echo json_encode(["success" => false, "message" => "Erro ao conectar com o banco de dados"]);
    exit;
}

// Verifica se o método é POST e se o ID do usuário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Consulta para buscar os detalhes do usuário
    $sql = "SELECT * FROM usuarios WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Se o usuário for encontrado
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(["success" => true, "user" => $user]);
    } else {
        echo json_encode(["success" => false, "message" => "Usuário não encontrado"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "ID do usuário não fornecido"]);
}
?>