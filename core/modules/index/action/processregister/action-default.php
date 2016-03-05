<?php

// registro del usuario
// @author evilnapsis
// @website http://evilnapsis.com/

if(!empty($_POST) && !isset($_SESSION["user_id"])){
//	print_r($_POST);

	$user = new UserData();

	$user->name=$_POST["name"];
	$user->lastname=$_POST["lastname"];
	$user->username=$_POST["username"];
	$user->password=sha1(md5($_POST["password"]));
	$user->email=$_POST["email"];
	$user->add();

	Core::alert("Usuario regisrado exitosamente!");
	Core::redir("./");

}

?>