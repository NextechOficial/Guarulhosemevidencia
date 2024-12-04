<?php

require_once '../models/Noticias.php';

require_once '../models/Database.php';


header('Content-Type: application/json');


ini_set('display_errors', 1);

error_reporting(E_ALL);


// Cria uma nova instância da classe Database

$db = new Database();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Verifica se os dados necessários foram enviados

    if (isset($_POST["notic_id"]) && isset($_POST["titulo"]) && isset($_POST["conteudo"])) {

        $notic_id = $_POST["notic_id"];

        $titulo = $_POST["titulo"];

        $conteudo = $_POST["conteudo"];

        $imagem = isset($_POST["imagem"]) ? $_POST["imagem"] : null; // Imagem é opcional


        $Notic = new Noticias($db);


        // Atualiza a notícia

        $response = $Notic->atualizarNoticia($notic_id, $titulo, $conteudo, $imagem);


        // Retorna a resposta em formato JSON

        echo json_encode($response);

    } else {

        echo json_encode(["success" => false, "message" => "Dados incompletos."]);

    }

} else {

    echo json_encode(["success" => false, "message" => "Método não permitido."]);

}

?>