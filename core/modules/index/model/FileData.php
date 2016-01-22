<?php
class FileData {
	public static $tablename = "file";

	public function FileData(){
		$this->name = "";
		$this->price_in = "";
		$this->price_out = "";
		$this->unit = "";
		$this->user_id = "";
		$this->presentation = "0";
		$this->created_at = "NOW()";
	}

	public function getCategory(){ return FileData::getById($this->category_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (folder_id,code,filename,description,is_public,user_id,created_at) ";
		$sql .= "value ($this->folder_id,\"$this->code\",\"$this->filename\",\"$this->description\",$this->is_public,$this->user_id,NOW())";
		return Executor::doit($sql);
	}

	public function add_folder(){
		$sql = "insert into ".self::$tablename." (code,filename,description,is_folder,is_public,user_id,created_at) ";
		 $sql .= "value (\"$this->code\",\"$this->filename\",\"$this->description\",1,$this->is_public,$this->user_id,NOW())";
		return Executor::doit($sql);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto FileData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set description=\"$this->description\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public function del_category(){
		$sql = "update ".self::$tablename." set category_id=NULL where id=$this->id";
		Executor::doit($sql);
	}


	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FileData());

	}

	public static function getByCode($id){
		$sql = "select * from ".self::$tablename." where code=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FileData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where barcode like '%$p%' or name like '%$p%' or id like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}


	public static function getRootFoldersByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id and is_folder=1 and folder_id is NULL order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}

	public static function getQFoldersByUserId($user_id,$q){
		$sql = "select * from ".self::$tablename." where user_id=$user_id and is_folder=1 and folder_id is NULL and (filename like '%$q%' or description like '%$q%') order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}

	public static function getRootByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id and folder_id is NULL order by is_folder desc, filename asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}


	public static function getQRootByUserId($user_id,$q){
		$sql = "select * from ".self::$tablename." where user_id=$user_id and folder_id is NULL and (filename like '%$q%' or description like '%$q%') order by is_folder desc, filename asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}


	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}


	public static function getAllByFolderId($folder_id){
		$sql = "select * from ".self::$tablename." where folder_id=$folder_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}

	public static function getQByFolderId($folder_id,$q){
		$sql = "select * from ".self::$tablename." where folder_id=$folder_id and  (filename like '%$q%' or description like '%$q%') order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}

	public static function getAllByCategoryId($category_id){
		$sql = "select * from ".self::$tablename." where category_id=$category_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FileData());
	}







}

?>