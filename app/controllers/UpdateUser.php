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

// Verifica se o método é POST e se todos os campos necessários estão presentes
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['fk_nivel_user_id'])) {
    $userId = $_POST['user_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $fk_nivel_user_id = $_POST['fk_nivel_user_id'];

    // Atualiza os dados do usuário
    $sql = "UPDATE usuarios SET nome = ?, email = ?, fk_nivel_user_id = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nome, $email, $fk_nivel_user_id, $userId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Usuário atualizado com sucesso"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao atualizar o usuário"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Campos obrigatórios estão faltando"]);
}
?>