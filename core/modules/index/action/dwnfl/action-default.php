<?php

$file = FileData::getByCode($_GET["code"]);

$url = "storage/data/".$file->user_id."/";
$filename = $file->filename;

if(!$file->is_folder){
	$fullurl=$url.$filename;
header("Content-Disposition: attachment; filename='$filename'");
readfile($fullurl); // or echo file_get_contents($filename);

}



?>