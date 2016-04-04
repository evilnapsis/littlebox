<?php 
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$token = "";
for($i=0;$i<6;$i++){
    $token .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$_SESSION["tkn"]=$token;
$folder=null;
if(isset($_GET["folder"]) && $_GET["folder"]!=""){
	$folder = FileData::getByCode($_GET["folder"]);
}

?>


<div class="container">


<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
	<li><a href="./?view=home"><i class="fa fa-home"></i> Inicio</a></li>
	<?php
	if($folder!=null){
	    echo '<li><a href="./?view=home&folder='.$folder->code.'"><i class="fa fa-folder-open"></i> '.$folder->filename.'</a></li>';
	}
	?>

</ol>

<div class="toolbar pull-right">
<div class="btn-group  ">
<a href="./?view=shared" class="btn btn-default"><i class="fa fa-globe"></i> Compartidos conmigo</a>
</div>
<div class="btn-group  ">
<a href="./?view=newfile" class="btn btn-default"><i class="fa fa-plus"></i> Archivo</a>
<a href="./?view=newfolder" class="btn btn-default"><i class="fa fa-folder"></i> Carpeta</a>
</div>
</div>

<?php if($folder==null):?>
<h1>Mis Archivos</h1>
<?php else:?>
<h1><?php echo $folder->filename;?></h1>
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

<?php
$files = null;
if($folder==null){
	if(isset($_GET["q"]) && $_GET["q"]!=""){
$files = FileData::getQRootByUserId($_SESSION["user_id"],$_GET["q"]);
}else{
$files = FileData::getRootByUserId($_SESSION["user_id"]);

}


}else{
	if(isset($_GET["q"]) && $_GET["q"]!=""){
	$files = FileData::getQByFolderId($folder->id,$_GET["q"]);

	}else{
	$files = FileData::getAllByFolderId($folder->id);
	}

}

?>

<?php if(isset($_GET["folder"]) && $_GET["folder"]!="" && $folder==null):?>
	<p class="alert alert-danger">Estas intentando acceder a una carpeta que no existe!</p>
<?php endif; ?>


<?php if(count($files)>0):?>

<?php if(isset($_GET["q"]) && $_GET["q"]!=""):?>
	<p class="alert alert-info">Resultado de la busqueda: <?php echo $_GET["q"];?></p>
<?php endif; ?>


<table class="table table-bordered">
<thead>
	<th></th>
	<th>Archivo</th>
	<th>Descripcion</th>
	<th>Tama&ntilde;o</th>
	<th>Fecha</th>
	<th></th>
</thead>
<?php foreach($files as $file):?>
<tr>
	<td></td>
	<td>
	<?php if($file->is_folder):?>
	<a href="./?view=home&folder=<?php echo $file->code;?>">
		<i class="fa fa-folder"></i>
	<?php else:?>
	<a href="./?view=file&code=<?php echo $file->code;?>">
		<i class="fa fa-file"></i>
	<?php endif; ?>
	<?php echo $file->filename; ?></a>
	</td>
	<td><?php echo $file->description; ?></td>
	<td><?php 
	$url = "storage/data/".$file->user_id."/".$file->filename;
	if(file_exists($url)){
	$fsize = filesize($url);
	if($file->filename!=""){
	if(!$file->is_folder){
	if($fsize>1000*1000*1000){
		echo ($fsize/1000*1000*1000)."Gb";
	}
	else if($fsize>1000*1000){
		echo ($fsize/1000*1000)."Mb";
	}
	else if($fsize>1000){
		echo ($fsize/1000)."Kb";
	}
	else if($fsize>0){
		echo $fsize."B";
	}
	}
	}
	}
	 ?></td>
	<td><?php echo $file->created_at; ?></td>
	<td style="width:223px;">
		<a href="./?view=filepermisions&id=<?php echo $file->code; ?>" class="btn btn-xs btn-default"><i class="fa fa-lock"></i> Permisos</a>
		<a href="./?view=editfile&id=<?php echo $file->code;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Editar</a>
		<a href="./?action=delfile&id=<?php echo $file->code; ?>&tkn=<?php echo $_SESSION["tkn"]?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>
<?php else:?>
	<div class="jumbotron">
	<h2>No hay archivos</h2>
	<p>No se encontraron archivos en la carpeta actual.</p>
	</div>
<?php endif;?>
</div>
</div>
</div>

