<?php

namespace app\models;

use app\core\DBQuery;
use app\core\Where;

require_once  dirname( __DIR__ , 1).'/config.php';



class Categorias {

	private $categoria_id;
	private $titulo;
	private $descricao;

	private $tableName  = "hostdeprojetos_guarulhosemevidencias.categorias";
	private $fieldsName = "categoria_id, titulo, descricao";
	private $fieldKey   = "categoria_id";
	private $dbquery     = null;

	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate( $categoria_id, $titulo, $descricao){

		 $this->setCategoria_id( $categoria_id );
		 $this->setTitulo( $titulo );
		 $this->setDescricao( $descricao );
	}

	public function toArray(){
		 return array(
			 'categoria_id' => $this->getCategoria_id(),
			 'titulo' => $this->getTitulo(),
			 'descricao' => $this->getDescricao()
		);
	}

	public function toJson(){
		return( json_encode( $this->toArray() ));
	}

	public function toString(){
		 return("\n\t\t\t". implode(", ",$this->toArray()));
	}


	public function save() {
		if($this->getCategoria_id() == 0){
			return( $this->dbquery->insert($this->toArray()));
		}else{
			return( $this->dbquery->update($this->toArray()));
		}
	}

	public function listAll() {
		    $rSet = $this->dbquery->select();
		    return( $rSet );
	}

	public function listByFieldKey( $value ){
		    $where = (new Where())->addCondition('AND', $this->fieldKey , '=', $value);
		    $rSet = $this->dbquery->selectWhere($where);
		    return( $rSet );
	}

	public function delete() {
		if($this->getCategoria_id() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
	}

	public function setCategoria_id( $categoria_id ){
		 $this->categoria_id = $categoria_id;
	}

	public function getCategoria_id(){
		  return( $this->categoria_id );
	}

	public function setTitulo( $titulo ){
		 $this->titulo = $titulo;
	}

	public function getTitulo(){
		  return( $this->titulo );
	}

	public function setDescricao( $descricao ){
		 $this->descricao = $descricao;
	}

	public function getDescricao(){
		  return( $this->descricao );
	}

}


?>