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
	$query = "select * from pedidos where estado = 'stand-by' and f_pedido = '$date' order by f_pedido desc";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$query);
	while($fila = mysqli_fetch_array($res)){
	      $count++;
	}
	$msg1 = "Aún no han ingresado Pedidos"; 
	$msg2 = "Tiene ".$count. " pedidos nuevos";
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard Administrador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/categories/preferences-desktop.png" />
	<?php skeleton();?>
  
	<!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
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
  
  <script >
	function limitText(limitField, limitNum) {
       if (limitField.value.length > limitNum) {
          
           alert("Ha ingresado más caracteres de los requeridos, deben ser: \n" + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
       
       if(limitField.value.lenght < limitNum){
	  alert("Ha ingresado menos caracteres de los requeridos, deben ser:  \n"  + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
}
</script>

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
    <p>Panel del Administrador</p>
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
	<button type="submit" name="B" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Clientes</button>
	<button type="submit" name="C" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/actions/view-income-categories.png" /> Ventas</button>
	<button type="submit" name="F" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/actions/office-chart-bar.png" /> Análisis de Ventas</button>
	</div> 
       </ul>
      <ul class="nav navbar-nav navbar-right">
      <button type="submit" name="D" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/status/meeting-chair.png" /> Tu Cuenta</button>
      <button type="submit" name="E" class="btn btn-default"><img class="img-reponsive img-rounded" src="../../icons/status/wallet-open.png" /> Pedidos</button>
       </ul>
       </form>
    </div>
  </div>
</nav><br>
	      <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	       <div class="alert alert-success" role="alert">
	       <h2 align="center">Bienvenido!! <strong><?php echo $nombre ?></strong></h2>
	       <h3 align="center">Seleccione desde los botones en el Panel la acción que desee realizar.</h3>
	       </div><hr>  
	       
	       <?php 
		if($count == 0){
		      echo '<div class="alert alert-info alert-dismissible">
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
	      
	      


<?php

  if($conn){
  
	    if(isset($_POST['A'])){
	    	  addProductos($conn);
	    }
	    if(isset($_POST['B'])){
		  loadUsers($conn);
	    }
	    if(isset($_POST['C'])){
		  loadVentas($conn);
	    }
	    if(isset($_POST['D'])){
		  loadRoot($nombre,$conn);
	    }
	    if(isset($_POST['E'])){
		  loadAsk($conn);
	    }
	    if(isset($_POST['F'])){
		  ventas_stats($conn);
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
  <p>Desarrollo: Slack Development - Email: slackdevel@gmail.com</p>
  <p>Powered By GNU/Linux</p> 
</footer>

<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>

					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
						<a class="btn btn-danger btn-ok"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</div>
				</div>
			</div>
		</div>

		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
		
		<!-- END Modal -->
		
		
	



</body>
</html>
