
<div class="container">


<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
	<li><a href="./?view=home"><i class="fa fa-home"></i> Inicio</a></li>
	<li><a href="./?view=shared"><i class="fa fa-folder"></i> Archivos compartidos</a></li>

</ol>


<h1>Archivos Compartirdos Conmigo</h1>


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
$files = PermisionData::getAllByUserId($_SESSION["user_id"]);
?>

<?php if(count($files)>0):?>
<table class="table table-bordered">
<thead>
	<th></th>
	<th>Archivo</th>
	<th>Descripcion</th>
	<th>Fecha</th>
</thead>
<?php foreach($files as $fx):
$file = $fx->getFile();
?>
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
	<td><?php echo $file->created_at; ?></td>
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

