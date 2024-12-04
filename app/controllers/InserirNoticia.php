<?php

require_once '../models/Database.php'; // Inclua seu arquivo de conexão com o banco de dados


header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Coleta de dados do formulário

    $titulo = $_POST["titulo"];

    $conteudo = $_POST["conteudo"];

    $fk_user_id = $_POST["fk_user_id"];

    $data = $_POST["data"];

    $imagem = $_FILES["imagem"]; // Use $_FILES para arquivos enviados

    $fk_categoria_id = $_POST["fk_categoria_id"];


    // Validação dos dados

    if (empty($titulo) || empty($conteudo) || empty($fk_user_id) || empty($fk_categoria_id)) {

        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);

        exit;

    }


    // Processamento do upload da imagem

    $imagemPath = null;


    // Cria uma nova instância da classe Database

    $db = new Database();

    

    // Prepara a instrução SQL

    $stmt = $db->prepare("INSERT INTO noticias (titulo, conteudo, fk_user_id, data, imagem, fk_categoria_id) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssisss", $titulo, $conteudo, $fk_user_id, $data, $imagemPath, $fk_categoria_id);


    // Executa a instrução

    if ($stmt->execute()) {

        echo json_encode(['success' => true, 'message' => 'Notícia criada com sucesso!']);

    } else {

        echo json_encode(['success' => false, 'message' => 'Erro ao criar a notícia.']);

    }


    // Fecha a instrução e a conexão

    $stmt->close();

    $db->close();

}

?>