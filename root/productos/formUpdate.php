<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
	$id = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Productos - Registro Actualizado</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/categories/preferences-desktop.png" />
	<?php skeleton();?>
	
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
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>T-SHIRTS</h1>      
    <h2>Online Store</h2>
    <a href="../main/main.php"><button class="btn btn-default"><img src="../../icons/actions/arrow-left.png" /><strong> Volver</strong></button></a>
  </div>
</div><br>

	  <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	 
	 <?php 
	 
	 if($conn){
		
		$id = mysqli_real_escape_string($conn,$_POST["id"]);
		$cod_prod = mysqli_real_escape_string($conn,$_POST["cod_prod"]);
		$cod_prod = strtoupper($cod_prod);
		$descripcion = mysqli_real_escape_string($conn,$_POST["descripcion"]);
		$descripcion = strtoupper($descripcion);
		$importe = mysqli_real_escape_string($conn,$_POST["importe"]);
		$tipo = mysqli_real_escape_string($conn,$_POST["tipo"]);
		
		$sql = "update productos set cod_prod = '$cod_prod', descripcion = '$descripcion', importe = '$importe', tipo = '$tipo' where id = '$id'";
		
		mysqli_select_db('t_shirts');
		$retval = mysqli_query($conn,$sql);
		
		if(!$retval){
			echo '<div class="alert alert-danger" role="alert">';
			echo 'Could not enter data: ' . mysqli_error($conn);
			echo "</div>";
			echo '<meta http-equiv="refresh" content="4;URL=http:nuevoRegistro.php "/>';
			}else{
			      echo '<div class="alert alert-success" role="alert">';
			      echo "Registro Actualizado Exitosamente!!";
			      echo "</div>";
			      echo '<meta http-equiv="refresh" content="4;URL=http:../main/main.php "/>';
			      } 
		    
		
		    }else{
			  echo '<div class="alert alert-danger" role="alert">';
			  echo 'Could not Connect to Database: ' . mysqli_error($conn);
			  echo '<meta http-equiv="refresh" content="4;URL=http:../main/main.php "/>';
			  echo "</div>";
			 }

	//cerramos la conexion
	
	mysqli_close($conn);
	 
	 
	
	 
	 ?>
	  
	  
	  </div>
	  </div>
	  </div>
	



</body>
</html>