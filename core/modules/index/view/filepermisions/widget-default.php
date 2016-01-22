<?php 
$file = FileData::getByCode($_GET["id"]);
?>
<div class="container">

<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><i class="fa fa-home"></i> Inicio</li>
  <li><i class="fa fa-lock"></i> Permisos</li>
</ol>
<h1><?php echo $file->filename;?> <small>Permisos</small></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">
<p>Escribe un email para otorgar permisos.</p>


<form role="form" method="post" action="./?action=addfilepermision">
<input type="hidden" name="file_id" value="<?php echo $file->id;?>">
  <div class="form-group row">
  <div class="col-md-7">
    <input type="text" class="form-control" name="email" required>
  </div>
  <div class="col-md-3">
  <select name="p_id" class="form-control">
    <option value="1"> Ver, Dercargar y Comentar</option>
  </select>
  </div>

  <div class="col-md-2">
  <button type="submit" class="btn btn-primary">Agregar</button>
  </div>
  </div>
</form>



<div class="clearfix"></div><br>
<?php 

$permisions = PermisionData::getAllByFileId($file->id);
//echo count($permisions);
?>

<?php if(count($permisions)>0):?>
  <table class="table table-bordered table-hover">
  <thead>
    <th>Usuario</th>
    <th>Permiso</th>
    <th>Fecha</th>
    <th></th>
    </thead>
  </thead>
    <?php foreach($permisions as $p):?>
      <tr>
        <td><?php echo $p->getUser()->getFullname();?></td>
        <td><?php if($p->p_id==1){ echo "Ver, Descargar y Comentar"; }?></td>
        <td><?php echo $p->created_at;?></td>
        <td style="width:30px;">
          <a href="./?action=delfilepermision&id=<?php echo $p->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach;?>
  </table>
<?php else:?>
  <div class="jumbotron">
  <h2>No hay permisos</h2>
  <p>Este archivo no tiene agregado ningun permiso.</p>
  </div>
<?php endif;?>

</div>
</div>
</div>

