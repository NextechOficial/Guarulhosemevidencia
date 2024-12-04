<?php

namespace app\models;

use app\core\DBQuery;
use app\core\Where;

require_once  dirname( __DIR__ , 1).'/config.php';



class NivelUsuario {

	private $idNivelUsuario;
	private $descricao;

	private $tableName  = "hostdeprojetos_guarulhosemevidencias.nivelUsuario";
	private $fieldsName = "idNivelUsuario, descricao";
	private $fieldKey   = "idNivelUsuario";
	private $dbquery     = null;

	function __construct(){
		$this->dbquery = new DBQuery($this->tableName, $this->fieldsName, $this->fieldKey);
	}

	function populate( $idNivelUsuario, $descricao){

		 $this->setIdNivelUsuario( $idNivelUsuario );
		 $this->setDescricao( $descricao );
	}

	public function toArray(){
		 return array(
			 'idNivelUsuario' => $this->getIdNivelUsuario(),
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
		if($this->getIdNivelUsuario() == 0){
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
		if($this->getIdNivelUsuario() != 0){
			return( $this->dbquery->delete($this->toArray()));
		}
	}

	public function setIdNivelUsuario( $idNivelUsuario ){
		 $this->idNivelUsuario = $idNivelUsuario;
	}

	public function getIdNivelUsuario(){
		  return( $this->idNivelUsuario );
	}

	public function setDescricao( $descricao ){
		 $this->descricao = $descricao;
	}

	public function getDescricao(){
		  return( $this->descricao );
	}

}


?>