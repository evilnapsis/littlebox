
<?php

$file = FileData::getByCode($_GET["id"]);

?>


<div class="container">



<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><i class="fa fa-home"></i> Inicio</li>
  <li><i class="fa fa-asterisk"></i> Editar archivo</li>
</ol>
<h1><a href="./?view=file&code=<?php echo $file->code; ?>"><?php echo $file->filename; ?></a> <small>Editar Archivo</small></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<form role="form" method="post" action="./?action=updatefile">


  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <textarea class="form-control" name="description"><?php echo $file->description;?></textarea>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="is_public" <?php if($file->is_public){ echo "checked"; }?>> Archivo publico
    </label>
  </div>
  <input type="hidden" name="id" value="<?php echo $file->id;?>">
  <button type="submit" class="btn btn-success">Actualizar</button>
</form>
	

</div>
</div>
</div>

