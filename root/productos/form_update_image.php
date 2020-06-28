
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

	  <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	      
<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	$id = $_GET['id'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
$statusMsg = '';


// File upload path
$targetDir = '../../pics/';
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
           
            
            // Insert image file name into database
           
           $sqlInsert = "UPDATE productos set imagen = '$targetFilePath' where id = '$id'";
			   mysqli_select_db('t_shirts');
			  $insert = mysqli_query($conn,$sqlInsert);
          
           
            if($insert){
			  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                          
                         
            
                //$statusMsg = "\nBase de Datos Actualizada. \nEl Archivo ".$fileName. " se ha subido correctamente.";
                
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong> El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
			  echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                         
                
            } 
        }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/think-img.png" alt="Avatar" class="avatar" ><strong> Ups. Hubo un error subiendo el Archivo.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                         
        }
    }else{
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/aircraft-crash64-img.png" alt="Avatar" class="avatar" ><strong> Ups, solo archivos con extensión: MP3, OGG, FLAC son soportados.</strong>';
			  echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                         
    }
}else{
			  echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/refresh-img.png" alt="Avatar" class="avatar" ><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main/main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
                          
}


                          
// Display status message
echo $statusMsg;

?>
</div>
</div>
</div>



</body>
</html>