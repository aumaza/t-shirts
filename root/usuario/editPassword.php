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
      $sql = "SELECT * FROM usuarios WHERE id = '$id'";
      mysqli_select_db('t_shirts');
      $resultado = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($resultado);


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Usuario - Editar Password</title>
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
	  <div class="panel panel-success" >
	      <div class="panel-heading">
	      <span class="pull-center "><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Usuario - Editar Password
	      </div>
	      <br>
	  
	   <form action="form_update_pass.php" method="POST">
	   <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>" />
	   
	   <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="inputName" name="nombre" value="<?php echo $fila['nombre'] ?>" readonly required/>
                    </div></div>
                    
                    <div class="col-sm-5">
                    <div class="form-group">
                        <label for="inputEmail">Usuario</label>
                        <input type="text" class="form-control" id="inputUser" name="user" value="<?php echo $fila['user']; ?>" readonly required/>
                    </div></div></div></div><hr>
                    
                     <div class="container">
		    <div class="row">
		    <div class="col-sm-5">
                    <div class="form-group">
                        <label for="inputMessage">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="pass1" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" required/>
                    </div></div>
                    
                    <div class="col-sm-5">
                    <div class="form-group">
                        <label for="inputMessage">Repetir Password</label>
                        <input type="password" class="form-control" id="inputPassword1" name="pass2" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" required />
                    </div></div></div></div><hr>
	  
	  <div class="container">
	   <div class="row">
	   <div class="col-sm-12" align="center">
	  <div class="form-group">
	    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>  Editar</button>
	    </div>
	  </div></div></div>
	 </form> 
	  
	  
	  
	  
	  
	  </div>
	  </div>
	  </div>
	



</body>
</html>