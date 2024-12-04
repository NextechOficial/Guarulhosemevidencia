<?php
    header('Content-Type: application/json');

    $response = ['success' => false];
    function desconectar() {
        if(isset($_SESSION["usuario"])) {
            unset($_SESSION["usuario"]);
            return true;
        }

        return false;
    }

    if (desconectar()) {
        $response['success'] = true;
    } 

    echo json_encode($response);