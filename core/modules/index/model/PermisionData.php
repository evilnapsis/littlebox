<?php
class PermisionData {
	public static $tablename = "permision";



	public function PermisionData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getUser(){ return UserData::getById($this->user_id);}
	public function getFile(){ return FileData::getById($this->file_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (p_id,file_id,user_id,created_at) ";
		$sql .= "value ($this->p_id,\"$this->file_id\",$this->user_id,$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PermisionData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PermisionData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisionData());
	}

	public static function getAllByFileId($file){
		$sql = "select * from ".self::$tablename." where file_id=".$file;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisionData());
	}

	public static function getAllByUserId($user){
		$sql = "select * from ".self::$tablename." where user_id=".$user;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisionData());
	}

}

?>