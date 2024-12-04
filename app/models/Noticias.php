<?php

    class Noticias {

        private $conn;
        private $notic_id;
        private $titulo;
        private $conteudo;
        private $fk_autor_id;
        private $data;
        private $imagem;
        private $fk_categoria_id;

        private $tableName  = "hostdeprojetos_guarulhosemevidencias.noticias";
        private $fieldsName = "notic_id, titulo, conteudo, fk_autor_id, data, imagem, fk_categoria_id";
        private $fieldKey   = "notic_id";
        private $dbquery    = null;

        public function __construct($db) {
            $this->conn = $db->conn; // Atribui a conexão mysqli
    
        }

        // Getters and Setters
        public function getNoticId(){
            return $this->notic_id;
        }
        public function setNoticId($notic_id){
            $this->notic_id = $notic_id;
        }

        public function getTitulo(){
            return $this->titulo;
        }
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getConteudo(){
            return $this->conteudo;
        }
        public function setConteudo($conteudo){
            $this->conteudo = $conteudo;
        }

        public function getFkAutorId(){
            return $this->fk_autor_id;
        }
        public function setFkAutorId($fk_autor_id){
            $this->fk_autor_id = $fk_autor_id;
        }

        public function getData(){
            return $this->data;
        }
        public function setData($data){
            $this->data = $data;
        }

        public function getImagem(){
            return $this->imagem;
        }
        public function setImagem($imagem){
            $this->imagem = $imagem;
        }

        public function getFkCategoriaId(){
            return $this->fk_categoria_id;
        }
        public function setFkCategoriaId($fk_categoria_id){
            $this->fk_categoria_id = $fk_categoria_id;
        }

        // Method to insert a new news article into the database
        public function inserirNoticia($titulo, $conteudo, $fk_user_id, $data, $imagem, $fk_categoria_id) {
            // Check if the news article already exists by title
            $query = "SELECT * FROM " . $this->tableName . " WHERE titulo = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('s', $titulo);
            $stmt->execute();
            $resultados = $stmt->get_result();

            // If the article doesn't exist, insert the new news
            if ($resultados->num_rows == 0) {
                $query = "INSERT INTO " . $this->tableName . " (titulo, conteudo, fk_autor_id, data, imagem, fk_categoria_id) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('ssissi', $titulo, $conteudo, $fk_user_id, $data, $imagem, $fk_categoria_id);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Method to get all news articles from the database
        public function getAllNoticias() {
            $query = "SELECT * FROM " . $this->tableName;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $resultados = $stmt->get_result();
            $updatedResults = [];

            if (mysqli_num_rows($resultados) > 0) {
                while ($noticia = mysqli_fetch_assoc($resultados)) {
                    $updatedResults[] = $noticia;
                }
                return $updatedResults;
            } else {
                return null;
            }
        }

        // Method to get a news article by its ID
        public function getNoticiaById($notic_id) {
            $query = "SELECT * FROM " . $this->tableName . " WHERE notic_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $notic_id);
            $stmt->execute();
            $resultados = $stmt->get_result();
            if (mysqli_num_rows($resultados) > 0) {
                return mysqli_fetch_assoc($resultados);
            } else {
                return null;
            }
        }
            
		public function deleteNoticia($notic_id) {

            // Primeiro, verifica se a notícia existe
        
            $checkQuery = "SELECT * FROM noticias WHERE notic_id = ?";
        
            $checkStmt = $this->conn->prepare($checkQuery);
        
            $checkStmt->bind_param('i', $notic_id);
        
            $checkStmt->execute();
        
            $result = $checkStmt->get_result();
        
        
            // Verifica se a notícia existe
        
            if ($result->num_rows > 0) {
        
                // A notícia existe, agora vamos excluí-la
        
                $deleteQuery = "DELETE FROM noticias WHERE notic_id = ?";
        
                $deleteStmt = $this->conn->prepare($deleteQuery);
        
                $deleteStmt->bind_param('i', $notic_id);
        
        
                if ($deleteStmt->execute()) {
        
                    $deleteStmt->close();
        
                    return ['success' => true, 'message' => 'Notícia excluída com sucesso.'];
        
                } else {
        
                    $deleteStmt->close();
        
                    return ['success' => false, 'message' => 'Erro ao excluir a notícia.'];
        
                }
        
            } else {
        
                $checkStmt->close();
        
                return ['success' => false, 'message' => 'Notícia não encontrada.'];
        
            }
        
        }
		
		public function getTituloNoticiaByNotic_id($notic_id){
            $query = "SELECT titulo from noticias WHERE notic_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $notic_id);
    
            $stmt->execute();
    
            $resultados = $stmt->get_result();
            if ($row = $resultados->fetch_assoc()) {
                return $row['titulo'];
            }
        }
		public function getNotic_idNoticiaByTitulo($titulo){
            $query = "SELECT * from usuarios WHERE titulo = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('s', $titulo);
    
            $stmt->execute();
    
            $resultados = $stmt->get_result();
            $funcionario = $resultados->fetch_assoc();
            return $funcionario;
        }
		public function getUser_idUsuarioByNotic_id($notic_id){
            $query = "SELECT user_id from noticias WHERE notic_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $notic_id);
    
            $stmt->execute();
    
            $resultados = $stmt->get_result();
            if ($row = $resultados->fetch_assoc()) {
                return $row['user_id'];
            }
        }
        public function atualizarNoticia($notic_id, $titulo, $conteudo, $imagem = null) {

            // Prepara a consulta de atualização
        
            $query = "UPDATE " . $this->tableName . " SET titulo = ?, conteudo = ?" . ($imagem ? ", imagem = ?" : "") . " WHERE notic_id = ?";
        
            $stmt = $this->conn->prepare($query);
        
        
            if ($imagem) {
        
                $stmt->bind_param("sssi", $titulo, $conteudo, $imagem, $notic_id);
        
            } else {
        
                $stmt->bind_param("ssi", $titulo, $conteudo, $notic_id);
        
            }
        
            $stmt->execute();
        
        
            if ($stmt->affected_rows > 0) {
        
                return ["success" => true, "message" => "Atualização realizada com sucesso"];
        
            } else {
        
                return ["success" => false, "message" => "Problemas ao atualizar notícia."];
        
            }
        
        }

}
?>