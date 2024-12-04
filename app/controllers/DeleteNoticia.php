<?php

require_once '../models/Noticias.php';

require_once '../models/Database.php';


header('Content-Type: application/json');


ini_set('display_errors', 1);

error_reporting(E_ALL);


// Cria uma nova instância da classe Database

$db = new Database();


// Inicializa a variável de resposta

$response = [

    "success" => false,

    "message" => "Erro desconhecido."

];


// Verifica se a requisição é do tipo POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtém o ID do usuário a ser excluído

    if (isset($_POST["notic_id"]) && !empty($_POST["notic_id"])) {

        $notic_id = $_POST["notic_id"];


        // Cria uma instância da classe Usuario

        $noticias = new Noticias($db); // Passa a instância do banco de dados


        // Tenta excluir o usuário

        $result = $noticias->deleteNoticia($notic_id);


        // Verifica o resultado da exclusão e retorna a resposta adequada

        if ($result) {

            $response = [

                "success" => true,

                "message" => "Noticia excluída com sucesso."

            ];

        } else {

            $response = [

                "success" => false,

                "message" => "Erro ao excluir a noticia. Verifique o ID informado ou se o usuário existe."

            ];

        }

    } else {

        // Caso o user_id não tenha sido informado

        $response = [

            "success" => false,

            "message" => "ID do usuário não informado ou inválido."

        ];

    }

} else {

    // Caso a requisição não seja do tipo POST

    $response = [

        "success" => false,

        "message" => "Método de requisição inválido."

    ];

}


// Retorna a resposta como JSON

echo json_encode($response);

exit;

?>