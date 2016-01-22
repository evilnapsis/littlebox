<?php

if(!empty($_POST)){
	$file= FileData::getById($_POST["id"]);

	$p= new CommentData();
	$p->user_id= $_SESSION["user_id"];
	$p->file_id = $_POST["id"];
	$p->comment= $_POST["comment"];
	$p->add();
	Core::alert("Agregado exitosamente!");
	Core::redir("./?view=file&code=".$file->code);


}

?>