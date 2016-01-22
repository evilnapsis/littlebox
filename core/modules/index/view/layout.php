<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LittleBox | Compartir Archivos Gratis</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./"><b>LittleBox</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

   <ul class="nav navbar-nav">
   <li><a href="./?view=home">INICIO</a></li>
<?php if(isset($_SESSION["user_id"])):?>
   <li>
 <form class="navbar-form navbar-left" role="search" method="get">
      <div class="form-group">
      <input type="hidden" name="view" value="home">
      <?php if(isset($_GET["folder"]) && $_GET["folder"]!=""):?>
      <input type="hidden" name="folder" value="<?php echo $_GET["folder"];?>">
    <?php endif; ?>
<div class="row">
<div class="col-md-12">
        <input type="text"  name="q" class="form-control" placeholder="Buscar ..." required>
</div>
</div>
      </div>
      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </form>
   </li>
 <?php endif; ?>
   </ul>





          <ul class="nav navbar-nav navbar-right navbar-user">
         
   <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <b>EVILNAPSIS </b><b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="http://evilnapsis.com/">Ver sitio</a></li>
          <li><a href="http://evilnapsis.com/store/">Ver Tienda</a></li>
        </ul>
        </li>
        <?php if(isset($_SESSION["user_id"])):
        $user = UserData::getById($_SESSION["user_id"]);
        ?>
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user->name; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
        </li>
      <?php endif;?>
        </ul>




        </div><!-- /.navbar-collapse -->
      </nav>


<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("index");
?>


    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/jquery.min.js"></script>
<script src="res/bootstrap3/js/bootstrap.min.js"></script>


  </body>
</html>
