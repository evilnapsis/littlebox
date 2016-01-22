<?php

//print_r($_SESSION);
if(!empty($_POST) && isset($_SESSION["user_id"])){

	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}

	$f = new FileData();
	$f->code= $code;
	$f->is_public = isset($_POST["is_public"])?1:0;
	$f->folder_id = $_POST["folder_id"]!=""?$_POST["folder_id"]:"NULL";
	$f->user_id=$_SESSION["user_id"];
	$f->description = $_POST["description"];


	$handle = new Upload($_FILES['filename']);
	if ($handle->uploaded) {
		$url="storage/data/".$_SESSION["user_id"];
		$handle->Process($url);
		if($handle->processed){
	    $f->filename = $handle->file_dst_name;
	    $f->add();
	    Core::alert("Agregado exitosamente!");
	    Core::redir("./?view=home");
		}

	}


}


?>