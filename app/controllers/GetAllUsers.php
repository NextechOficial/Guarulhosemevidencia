<?php

require_once '../models/Usuario.php';

require_once '../models/Database.php';

header('Content-Type: application/json');


ini_set('display_errors', 1);

error_reporting(E_ALL);


$db = new Database();

$usuario = new Usuario($db);


// Exemplo de como obter todos os usuários

$allUsers = $usuario->getAllUsers();


if ($allUsers !== null) {

    echo json_encode(["success" => true, "usuario" => $allUsers]);

} else {

    echo json_encode(["success" => false, "message" => "Nenhum usuário encontrado."]);

}


$db->close(); // Fechar a conexão ao final

?>