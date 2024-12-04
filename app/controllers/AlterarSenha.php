<?php
    header('Content-Type: application/json');

    $response = "";

    if (!$conn) {
        $response = ["success" => false, "message" => "Erro ao conectar com o banco de dados"];
        echo json_encode($response);
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $user_id = $_POST['user_id'];
        $senha01 = $_POST['senha01'];
        $senha01Repetida = $_POST['senha01Repetida'];

        $senhahash = password_hash($senha01, PASSWORD_DEFAULT);


        if ($senha01 === "PrimeiroAcesso$user_id") {
            $response = ["success" => false, "message" => "Não utilize a senha básica"];
            echo json_encode($response);
            exit;
        }

        
        if ($senha01 !== $senha01Repetida) {
            $response = ["success" => false, "message" => "As senhas não são iguais"];
            echo json_encode($response);
            exit;
        }

        $User = new Usuario($conn);

        $response = $User->alterarSenha( $user_id, $senhahash);
        echo json_encode($response);
    }