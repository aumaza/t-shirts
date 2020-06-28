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
  <title>Dashboard Administrador</title>
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

	  <div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    
                    <div class="alert alert-success" role="alert">
                     <h1><strong>Seleccione Imágen</strong></h1>
                     </div>

                                       
<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
<form action="form_update_image.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	  <div class="row">
	    <div class="col-sm-8">
	      <div class="panel panel-default">
		<div class='panel-heading'>
		<strong>Seleccione el Archivo a Subir:</strong>
		<br>
	      <input type="file" name="file" class="btn btn-default"><br>
	      <button type="submit" class="btn btn-warning navbar-btn" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
	      
	    </form>
	  
	   </div>
	    
     </div>
   </div>
</div>
</div>
</div>
</div>
</div>
	



</body>
</html>