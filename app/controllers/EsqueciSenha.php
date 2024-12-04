<?php
    header('Content-Type: application/json');

    if (!$conn) {
        $response = ["success" => false, "message" => "Erro ao conectar com o banco de dados"];
        echo json_encode($response);
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user_id = preg_replace('/\D/', '', $_POST["user_id"]); // Limpa o CPF do usuário
    
        if (empty($cpf)) {
            echo json_encode(["success" => false, "message" => "O campo User_id é obrigatório"]);
            exit;
        }

        $User = new usuario($conn);
    
        $result = $User->resetSenhaPadrao($user_id);
        echo json_encode($result);
    }

    //alterar essa função
    