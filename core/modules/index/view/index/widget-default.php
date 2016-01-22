<?php

if(isset($_SESSION["user_id"])){ Core::redir("./?view=home");}

?>
<div class="container">
<div class="row">
<div class="col-md-8">
<img src="res/images/start.png" class="img-responsive img-thumbnail">
<h1>Bienvenido a LittleBox</h1>

<div class="row">
<div class="col-md-4">
<h4>LittleBox</h4>
<p>LittleBox es una sistema para compartir archivos de manera facil y rapida.</p>
</div>
<div class="col-md-4">
<h4>Compartir</h4>
<p>Al crear una cuenta en LittleBox puedes subir archivos para compartirlos publica o privadamente.</p>
</div>
<div class="col-md-4">
<h4>Discutir</h4>
<p>Puedes escribir comentarios en los archivos o documentos para los que tengas permisos de hacerlo.</p>
</div>
</div>

<h4>Acerca del autor</h4>
<p>Agustin Ramos Escalante, desarrollador de software, inventor y emprendedor.</p>
<a class="btn btn-xs btn-default" href="http://evilnapsis.com/"><i class="fa fa-globe"></i></a> 
<a class="btn btn-xs btn-default" href="http://evilnapsis.com/store/"><i class="fa fa-shopping-cart"></i></a> 
<a class="btn btn-xs btn-primary" href="https://facebook.com/iamevilnapsis"><i class="fa fa-facebook"></i></a> 
<a class="btn btn-xs btn-info" href="https://twitter.com/evilnapsis"><i class="fa fa-twitter"></i></a> 
<a class="btn btn-xs btn-danger" href="http://youtube.com/evilnapsis"><i class="fa fa-youtube-play"></i></a> 
<a class="btn btn-xs btn-warning" href="http://mx.linkedin.com/in/evilnapsis"><i class="fa fa-linkedin"></i></a> 



</div>
<div class="col-md-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Ingresar</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?action=processlogin">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Usuario o email" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-default btn-block" type="submit" value="Iniciar Sesion">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Registro</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?action=processregister">
                    <fieldset>
			    	  	<div class="form-group row">
			    	  	<div class="col-md-6">
			    		    <input class="form-control" placeholder="Nombre" name="name" type="text">
			    		    </div>
			    	  	<div class="col-md-6">
			    		    <input class="form-control" placeholder="Apellido" name="lastname" type="text">
			    		    </div>
			    		</div>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Nombre de usuario" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Email" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-default btn-block" type="submit" value="Registro">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
</div>
</div>
</div>
<br>