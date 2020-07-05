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
	
	$date = strftime("%Y-%m-%d");
	$query = "select * from pedidos where estado = 'Aprobado' and cliente = '$nombre' order by f_pedido desc";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$query);
	while($fila = mysqli_fetch_array($res)){
	      $count++;
	}
	$msg1 = "Aún no tiene Pedidos Aprobados"; 
	$msg2 = "Tiene ".$count. " pedido/s Aprobado/s";
	
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard Usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/categories/preferences-desktop.png" />
	<?php skeleton();?>
 
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
  
  <!-- block mouse left-button   -->
  <script>
      $(document).bind("contextmenu",function(e) {
    e.preventDefault();
    });
  </script>
<!-- block F12 development mode -->
  <script>
      $(document).keydown(function(e){
	if(e.which === 123){
	  return false;
	}
    });
  </script>
  
  
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
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="jumbotron">
  <div class="container text-center">
    <h1>T-SHIRTS</h1>      
    <h2>Online Store</h2>
    <p>Bienvenido!! <strong><?php echo $nombre ?></strong></p>
    <a href="../../logout.php"><button class="btn btn-default"><img src="../../icons/actions/go-previous-view.png" /><strong> Salir</strong></button></a>
  </div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-top">
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
</nav><br>


	      <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	       <div class="alert alert-success" role="alert">
	       <h2 align="left"><img class="img-reponsive img-rounded" src="../../icons/devices/computer-laptop.png" /><strong> Vidriera Virtual</strong></h2>
	       </div><hr>
	       
	       <?php 
		if($count == 0){
		      echo '<div class="alert alert-success alert-dismissible">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			      <img class="img-reponsive img-rounded" src="../../icons/emotes/face-uncertain.png" /><strong> '.$msg1.'</strong>
			    </div>';
		  }else{
		      echo '<div class="alert alert-success alert-dismissible">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			      <img class="img-reponsive img-rounded" src="../../icons/emotes/face-smile.png" /><strong> '.$msg2.'</strong>
			    </div>';
		      }
      
		?>
	      <hr>
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

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p><b>Contacto</b></p>
  <p>Email: store.tshirt.onweb@gmail.com</p><hr>
  <p>Powered By GNU/Linux</p> 
</footer>

<!-- Modal QR-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Código QR</h4>
      </div>
      <div class="modal-body" >
      <div class="container">    
	<div class="row" >
         <div class="col-sm-4">
	  <div class="panel panel-default">
	  <div class="panel-heading" align="center">QR</div>
	  <div class="panel-body"><img src="../../img/qr_mp_tshirts.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Gracias!</div>
      </div>
    </div>
    </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>
<!-- En MOdal -->


</body>
</html>
