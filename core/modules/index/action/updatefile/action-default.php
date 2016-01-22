<?php


if(!empty($_POST)){
	$file = FileData::getById($_POST["id"]);
	$file->description = $_POST["description"];
	$file->is_public = isset($_POST["is_public"])?1:0;
	$file->update();

}

Core::redir("./?view=editfile&id=".$file->code);

?>