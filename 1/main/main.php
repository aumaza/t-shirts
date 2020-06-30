<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('t_shirts');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard Usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/categories/preferences-desktop.png" />
	<link rel="stylesheet" href="/t-shirts/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/t-shirts/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="/t-shirts/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/t-shirts/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/t-shirts/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/t-shirts/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/t-shirts/skeleton/js/dataTables.select.min.js"></script>
	<script src="/t-shirts/skeleton/js/dataTables.buttons.min.js"></script>
 
  <!-- Data Table Script -->
<script>

      $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });

  </script>
  <!-- END Data Table Script -->
  
  
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    .avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 100px;
  height: 100px;
  border-radius: 80%;
  }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>T-SHIRTS</h1>      
    <h2>Online Store</h2>
    <p>Bienvenido!! <strong><?php echo $nombre ?></strong></p>
    <a href="../../logout.php"><button class="btn btn-default"><img src="../../icons/actions/go-previous-view.png" /><strong> Salir</strong></button></a>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <form action="main.php" method="POST">
       <div class="btn-group">
	<button type="submit" name="A" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/actions/feed-subscribe.png" /> Productos</button>
	</div> 
       </ul>
      <ul class="nav navbar-nav navbar-right">
      <button type="submit" name="B" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/status/meeting-chair.png" /> Tu Cuenta</button>
      <button type="submit" name="C" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/status/wallet-open.png" /> Mis Pedidos</button>
       </ul>
       </form>
    </div>
  </div>
</nav>

	      <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	       <div class="alert alert-success" role="alert">
	       <h2 align="left"><img class="img-reponsive img-rounded" src="../../icons/devices/computer-laptop.png" /><strong> Vidriera Virtual</strong></h2>
	       </div><hr>      
	      
	      </div>
	      </div>
	      </div>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">Remera AC/DC (Gris)</div>
        <div class="panel-body"><img src="../../pics/pic13.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera Hard Rock Cafe (Rojo)</div>
        <div class="panel-body"><img src="../../pics/pic12.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera The Cure (Negra)</div>
        <div class="panel-body"><img src="../../pics/pic11.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">Remera Guns and Roses (Blanca)</div>
        <div class="panel-body"><img src="../../pics/pic10.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera Rocky Balboa (Blanca)</div>
        <div class="panel-body"><img src="../../pics/pic09.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera Rolling Stones (Negra)</div>
        <div class="panel-body"><img src="../../pics/pic08.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
  </div>
</div><br><br>

<?php

  if($conn){
  
	    if(isset($_POST['A'])){
		 productos($conn);
		
	    }
	    if(isset($_POST['B'])){
		 loadUser($nombre,$conn);
	    }
	    if(isset($_POST['C'])){
		  loadUserAsk($nombre,$conn);
	    }
	  
  
  
  }else{
    
      echo "Error..." .mysqli_error($conn);
  }


?>


</body>
</html>
