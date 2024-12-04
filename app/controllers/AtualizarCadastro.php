<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
if (!$conn) {
    $response = ["success" => false, "message" => "Erro ao conectar com o banco de dados"];
    echo json_encode($response);
    exit;
}

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Verifica se todos os parâmetros necessários foram passados
    if (isset($_POST['user_id']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['fk_nivel_user_id'])) {
        
        $userId = $_POST['user_id'];  // ID do usuário a ser atualizado
        $nome = $_POST['nome'];  // Novo nome
        $email = $_POST['email'];  // Novo email
        
        // Cria um objeto de usuário
        $User = new Usuario($conn);

        // Atualiza os dados do usuário no banco
        $result = $User->atualizarCadastroUsuario($userId, $nome, $email);

        // Verifica se a atualização foi bem-sucedida
        if ($result) {
            // Recupera a lista de usuários atualizada
            $allUsers = $User->getAllUsers();
            $response = [
                "success" => true,
                "message" => "Usuário atualizado com sucesso",
                "usuarios" => $allUsers
            ];
        } else {
            // Caso ocorra algum erro na atualização
            $response = ["success" => false, "message" => "Erro ao atualizar o usuário"];
        }

        // Retorna a resposta em formato JSON
        echo json_encode($response);

    } else {
        // Caso algum parâmetro obrigatório esteja faltando
        $response = ["success" => false, "message" => "Campos obrigatórios estão faltando"];
        echo json_encode($response);
    }
}
?>