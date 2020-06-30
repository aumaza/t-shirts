<?php include "../connection/connection.php";
      include "../functions/functions.php";

	

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Creación de Usuario</title>
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

<script>
function Numeros(string){
//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
             //Se añaden a la salida los caracteres validos
              out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permiten Números");
	     }
	     }
	
    //Retornar valor filtrado
    return out;
} 
</script>


<script> 
function Text(string){//validacion solo letras
    var out = '';
    //Se añaden las letras validas
    var filtro ="^[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ]+$"; // Caracteres Válidos
	
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
	     out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permite Texto");
	     }
	     }
    return out;
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
    <h2>Online Store - Creación de Usuarios</h2>
    <a href="../logout.php"><button class="btn btn-default"><img src="../icons/actions/arrow-left.png" /><strong> Volver</strong></button></a>
  </div>
</div><br>

	  <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	 
	
	 <div class="alert alert-success" role="alert">
	 <h1>Ahora Continuaremos con la creación de un usuario</h1>
	  <h3>Preste atención al crear el usuario ya que será este el que utilizará para ingresar a la aplicación</h3>
	  </div>
	
	   <form action="formRegistroFinal.php" method="POST">
	   
	   <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Nombre</span>
	      <input id="text" type="text" class="form-control" name="nombre" value="<?php echo $_GET['nombre']; ?>" readonly required>
	    </div></div>
	   
	   <div class="col-sm-5">
	   <div class="input-group">
	      <span class="input-group-addon">Usuario</span>
	      <input id="text" type="text" class="form-control" name="user" onkeyup="this.value=Text(this.value);" onKeyDown="limitText(this,15);" onKeyUp="limitText(this,15);" required>
	    </div></div></div></div><br>
	    
	    <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Password</span>
	      <input id="text" type="password" class="form-control" name="pass1" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" required>
	    </div></div>
	   
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Repita Password</span>
	      <input id="text" type="password" class="form-control" name="pass2" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" required>
	    </div></div></div></div><hr>
	  
	  <div class="container">
	   <div class="row">
	   <div class="col-sm-12" align="center">
	  <div class="form-group">
	    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Finalizar</button>
	    </div>
	  </div></div></div>
	 </form> 
	  
	
	  
	  </div>
	  </div>
	  </div>
	



</body>
</html>