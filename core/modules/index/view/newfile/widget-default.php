
<?php

$folders = FileData::getRootFoldersByUserId($_SESSION["user_id"]);

?>


<div class="container">



<div class="row">
<div class="col-md-12">
<h1>Nuevo Archivo</h1>
<ol class="breadcrumb">
	<li><i class="fa fa-home"></i> Inicio</li>
	<li><i class="fa fa-asterisk"></i> Nuevo archivo</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-md-12">

<form role="form" method="post" action="./?action=addfile" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Archivo</label>
    <input type="file" name="filename" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Carpeta</label>
    <select name="folder_id" class="form-control">
    	<option value=""> /</option>
    <?php foreach($folders as $fld ):?>
    	<option value="<?php echo $fld->id;?>"> <?php echo $fld->filename;?></option>
    <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <textarea class="form-control" name="description"></textarea>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="is_public"> Archivo publico
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
	

</div>
</div>
</div>

