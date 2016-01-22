<?php 
$file = null;
if(isset($_GET["code"]) && $_GET["code"]!=""){
	$file = FileData::getByCode($_GET["code"]);
}

$is_public = false;
$is_logged = false;
$is_owner = false;
$go = false;

if($file->is_public){ $is_public=true; }
if(isset($_SESSION["user_id"])){ $is_logged= true;}
if($is_logged && $_SESSION["user_id"]==$file->user_id){ $is_owner = true; }

if($is_public){
	$go=true;
}
if(!$is_logged){
	Core::alert("Acceso Denegado!");
	Core::redir("./");
}
else if ($go==false && !$is_owner){
	
	$ps = PermisionData::getAllbyFileId($file->id);
	$found=false;
	foreach ($ps as $p) {
		if($p->user_id==$_SESSION["user_id"]){
			$found = true;
		}
	}

	if($found==true){
		$go=true;
	}else{
		Core::alert("Acceso Denegado!");
		Core::redir("./?view=shared");
	}


}

?>

<?php if($go||$is_owner):?>
<div class="container">


<div class="row">
<div class="col-md-12">
<?php if(isset($_SESSION["user_id"])):?>
<ol class="breadcrumb">
	<li><a href="./?view=home"><i class="fa fa-home"></i> Inicio</a></li>
	<?php
	if($file->folder_id!=null){
		$f = FileData::getById($file->folder_id);
	    echo '<li><a href="./?view=home&folder='.$f->code.'"><i class="fa fa-folder-open"></i> '.$f->filename.'</a></li>';
	}
	?>

</ol>
<?php endif; ?>
<div class="btn-group  pull-right">
<a href="./?action=dwnfl&code=<?php echo $file->code;?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar</a>
</div>

<?php if($file==null):?>
<h1>404</h1>
<?php else:?>
<h1><?php echo $file->filename;?></h1>
<?php endif;?>

<p><?php echo $file->description; ?></p>
<br>
<p class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $file->created_at;?></p>

<?php 
$comments = CommentData::getAllByFileId($file->id);?>
<h3>Comentarios (<?php echo count($comments);?>)</h3>

<form method="post" action="./?action=addfilecomment">
<div class="form-group">
	<textarea name="comment" required class="form-control"></textarea>
	</div>
	<input type="hidden" value="<?php echo $file->id?>" name="id">
	<input type="submit" class="btn btn-primary" value="Enviar comentario">
</form>
<br>
<?php if(count($comments)>0):?>
	<table class="table table-bordered">
<?php foreach($comments as $com): ?>
<tr>
	<td>
	<h4><?php echo $com->getUser()->getFullname();?></h4>
	<p><?php echo $com->comment;?></p>
	</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif;?>

</div>
</div>

<div class="row">
<!--<div class="col-md-3">
<div class="list-group">
<a class="list-group-item">Archivos</a>
</div>
</div>
-->
<div class="col-md-12">


<?php if($file!=null):?>

<?php else:?>
	<div class="jumbotron">
	<h2>No hay archivos</h2>
	<p>No se encontraron archivos en la carpeta actual.</p>
	</div>
<?php endif;?>
</div>
</div>
</div>


<?php endif;?>