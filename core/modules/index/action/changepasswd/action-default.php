<?php


if(isset($_SESSION["user_id"])){
	$user = UserData::getById($_SESSION["user_id"]);
	$password = sha1(md5($_POST["password"]));
	if($password==$user->password){
		$user->password = sha1(md5($_POST["newpassword"]));
		$user->update_passwd();
		setcookie("password_updated","true");
		print "<script>alert('Actualizado Exitosamente!');window.location='index.php?view=configuration';</script>";
	}else{
		print "<script>alert('Error! No coincide.');window.location='index.php?view=configuration&msg=invalidpasswd';</script>";		
	}

}else {
		print "<script>window.location='index.php';</script>";
}


?>