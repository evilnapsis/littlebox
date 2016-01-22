<div class="container">

<div class="row">
<div class="col-md-12">
<h1>Nueva Carpeta</h1>
<ol class="breadcrumb">
	<li><i class="fa fa-home"></i> Inicio</li>
	<li><i class="fa fa-asterisk"></i> Nueva carpeta</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-md-12">

<form role="form" method="post" action="./?action=addfolder">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" name="filename" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <textarea class="form-control" name="description"></textarea>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" > Archivo publico
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
	

</div>
</div>
</div>

