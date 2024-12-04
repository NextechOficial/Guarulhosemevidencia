<?php
    
    class Usuario {
        private $conn;
        
        private $user_id;
        private $fk_nivel_user_id;
        private $nome;
        private $email;
        private $senha;
        private $tipo_user;
// atualizar - feito/ inserir -feito/ get - feito/ delete - feito
        private $tableName  = "hostdeprojetos_guarulhosemevidencias.usuarios";
        private $fieldsName = "user_id, fk_nivel_user_id, nome, email, senha, tipo_user";
        private $fieldKey   = "user_id";
        private $dbquery    = null;

    function __construct($conn)
    {
        $this->conn = $conn; //alterei
    }

        // Getters and Setters
        public function getUserId(){
            return $this->user_id;
        }
        public function setUserId($user_id){
            $this->user_id = $user_id;
        }

        public function getFkNivelUserId(){
            return $this->fk_nivel_user_id;
        }
        public function setFkNivelUserId($fk_nivel_user_id){
            $this->fk_nivel_user_id = $fk_nivel_user_id;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getTipoUser(){
            return $this->tipo_user;
        }
        public function setTipoUser($tipo_user){
            $this->tipo_user = $tipo_user;
        }
        
        public function setAll($user_id, $fk_nivel_user_id, $nome, $email, $senha,$tipo_user) {
            $this->setUserId($user_id);
            $this->setFkNivelUserId($fk_nivel_user_id);
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setTipoUser($tipo_user);
        }

        
        // Method to insert a new user into the database
        public function inserirUsuario($fk_nivel_user_id, $nome, $email, $senha, $tipo_user){
            $query = "INSERT INTO usuarios (fk_nivel_user_id, nome, email, senha, tipo_user) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($query);
         
            $stmt->bind_param('issss', $fk_nivel_user_id,$nome, $email,$senha,$tipo_user);
            
            $stmt->execute();

            $stmt->close();
        }
        
        public function getNomeUsuarioByUser_id($user_id){
            $query = "SELECT nome from usuarios WHERE user_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $user_id);
    
            $stmt->execute();
    
            $resultados = $stmt->get_result();
            if ($row = $resultados->fetch_assoc()) {
                return $row['nome'];
            }
        }

        public function getUsuarioByUser_id($user_id){
            $query = "SELECT * from usuarios WHERE user_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $user_id);
    
            $stmt->execute();
    
            $resultados = $stmt->get_result();
            $funcionario = $resultados->fetch_assoc();
            return $funcionario;
        }

        public function getUser_idUsuarioByNome($nome){
            $query = "SELECT user_id from usuarios WHERE nome = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('s', $nome);
    
            $stmt->execute();
    
            $resultados = $stmt->get_result();
            if ($row = $resultados->fetch_assoc()) {
                return $row['user_id'];
            }
        }
        public function getAllUsers() {

            $query = "SELECT * FROM usuarios WHERE user_id > 0";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $resultados = $stmt->get_result();
            $updatedResults = [];
            if (mysqli_num_rows($resultados) > 0) {
                while ($usuario = mysqli_fetch_assoc($resultados)) {
                    $updatedResults[] = $usuario;
                }
                return $updatedResults;
            } else {
                return null;
            }
        }
        
        public function deleteUsuario($user_id) {

            // Primeiro, verifica se o usuário existe
        
            $query = "SELECT * FROM usuarios WHERE user_id = ?";
        
            $stmt = $this->conn->prepare($query);
        
            $stmt->bind_param('i', $user_id);
        
            $stmt->execute();
        
            $result = $stmt->get_result();
        
        
            // Verifica se o usuário existe
        
            if ($result->num_rows > 0) {
        
                // O usuário existe, agora vamos excluí-lo
        
                $deleteQuery = "DELETE FROM usuarios WHERE user_id = ?";
        
                $deleteStmt = $this->conn->prepare($deleteQuery);
        
                $deleteStmt->bind_param('i', $user_id);
        
                
        
                if ($deleteStmt->execute()) {
        
                    $deleteStmt->close();
        
                    return ['success' => true, 'message' => 'Usuário excluído com sucesso.'];
        
                } else {
        
                    $deleteStmt->close();
        
                    return ['success' => false, 'message' => 'Erro ao excluir o usuário.'];
        
                }
        
            } else {
        
                $stmt->close();
        
                return ['success' => false, 'message' => 'Usuário não encontrado.'];
        
            }
        
        }

    public function verificarUsuario($email, $senha)
    {
        session_start();
        header('Content-Type: application/json');
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email); //i == string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                // $redirectUrl = $_SESSION["goTo"] === "" || $_SESSION["goTo"] === "/admin/login"
                // ? "/admin" : $_SESSION["goTo"];
                // unset($_SESSION["goTo"]);
                // return ["success" => true, "message" => "Login Realizado com sucesso", "usuarios" => $user_id, "redirect" => $redirectUrl];
                if($usuario["fk_nivel_user_id"] >1){
                    $_SESSION["adm"] = "ativo";
                    header("Location: app/view/gerenciadorteste1.php");

                }
                return ["success" => true, "message" => "Login Realizado com sucesso", "usuario" => $email];
            } else {
                return [
                    "success" => false,
                    "message" => "Senha incorreta",
                    "usuario" => ""
                ];
            }
        }

        return ["success" => false, "message" => "Usuário não encontrado", "Usuario" => ""];
    }
    
        public function alterarSenha($user_id, $senha) {
            $query = "UPDATE usuarios SET senha = ?, primAcess = false WHERE user_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("si", $senha, $user_id);
            $stmt->execute();
            // s é de string, i de int
            
            if ($stmt->affected_rows > 0) {
                return ["success" => true, "message" => "Senha alterada com sucesso"];
            } else {
                return ["success" => false, "message" => "Nenhuma alteração feita. Verifique se o CPF está correto."];
            }
        }

        public function atualizarCadastroUsuario($nome, $email, $user_id) {
            $query = "UPDATE usuarios SET nome = ?, email = ? WHERE user_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssi", $nome, $email, $user_id);
            $stmt->execute();
            
            if ($stmt->affected_rows > 0) {
                return ["success" => true, "message" => "Atualização realizada com sucesso"];
            } else {
                return ["success" => false, "message" => "Problemas ao atualizar cadastro."];
            }
        }

    }
?>
