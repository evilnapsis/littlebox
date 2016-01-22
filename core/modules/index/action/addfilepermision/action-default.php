<?php

if(!empty($_POST)){


$user = UserData::getByNick($_POST["email"]);
$file = FileData::getById($_POST["file_id"]);
if($user!=null){
	if($user->id!=$_SESSION["user_id"]){

		$p= new PermisionData();
		$p->user_id= $user->id;
		$p->file_id = $file->id;
		$p->p_id= $_POST["p_id"];
		$p->add();
		Core::alert("Agregado exitosamente!");

	}else{
		Core::alert("No puedes agregarte ati mismo!");
	}

}else{
	Core::alert("El usuario no existe!");
}

	Core::redir("./?view=filepermisions&id=".$file->code);

}

?>