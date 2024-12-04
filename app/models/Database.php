<?php

class Database {

private $servername = "144.217.39.54";

private $username = "hostdeprojetos";

private $password = "ifspgru@2022";

private $databasename = "hostdeprojetos_guarulhosemevidencias";

public $conn;


public function __construct() {

    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databasename);

    if ($this->conn->connect_error) {

        die(json_encode(["success" => false, "message" => "Erro de conexão: " . $this->conn->connect_error]));

    }

}
public function prepare($sql) {

    return $this->conn->prepare($sql);

}

public function close() {

    $this->conn->close();

}

}

?>