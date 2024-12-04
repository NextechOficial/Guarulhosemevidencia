<?php
    require_once "../models/Usuario.php";
    header('Content-Type: application/json');
    $servername = "144.217.39.54";
    $username = "hostdeprojetos";
    $password = "ifspgru@2022";
    $databasename = "hostdeprojetos_guarulhosemevidencias";
    

    $conn = new mysqli($servername, $username, $password, $databasename);
    if (!$conn) {
        $response = ["success" => false, "message" => "Erro ao conectar com o banco de dados"];
        echo json_encode($response);
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        //coleta de dados do formulário
        $fk_nivel_user_id = 1;
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senhahash = password_hash($senha, PASSWORD_DEFAULT);
        $tipo_user = "N";

        if (empty($nome) || empty($email)) {
            $response = ["success" => false, "message" => "Campos obrigatórios estão faltando"];
            echo json_encode($response);
            exit;
        }

        $User = new Usuario($conn);

       // $UsuarioSelecionado = $User->getUsuarioByUser_id($user_id);

        $usuario = new Usuario($conn);
        $usuario->setNome($nome);
        $usuario->setEmail($email); 


        
            $usuario->inserirUsuario($fk_nivel_user_id, $nome, $email, $senhahash,$tipo_user);
        

        $response = ["success" => true, "message" => "Usuario inserido com sucesso"];
        echo json_encode($response);
        
    }  else {
        $response = ["success" => false, "message" => "Método não permitido"];
        echo json_encode($response);
    }