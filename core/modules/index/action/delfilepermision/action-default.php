<?php


if(!empty($_GET)){
	$fp = PermisionData::getById($_GET["id"]);
//	print_r($fp);
	$file = FileData::getById($fp->file_id);
	$fp->del();
	Core::redir("./?view=filepermisions&id=".$file->code);
}


?>