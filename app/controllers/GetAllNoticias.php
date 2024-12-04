<?php
require_once '../models/Noticias.php';
require_once '../models/Database.php';
header('Content-Type: application/json');

ini_set('display_errors', 1);

error_reporting(E_ALL);

$db = new Database();

$noticias = new Noticias($db);


// Exemplo de como obter todas as notícias

$allNoticias = $noticias->getAllNoticias();

if ($allNoticias !== null) {

    echo json_encode(["success" => true, "noticias" => $allNoticias]);

} else {

    echo json_encode(["success" => false, "message" => "Nenhuma notícia encontrada."]);

}


$db->close(); // Fechar a conexão ao final

?>