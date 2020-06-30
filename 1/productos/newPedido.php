<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	$sq = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('t_shirts');
	$retval = mysqli_query($conn,$sq);
	while($row = mysqli_fetch_array($retval)){
	      $nombre = $row['nombre'];
	}
	
	$qu = "select * from clientes where nombre = '$nombre'";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$qu);
	$linea = mysqli_fetch_assoc($res);
	
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
      $sql = "SELECT * FROM productos WHERE id = '$id'";
      mysqli_select_db('t_shirts');
      $resultado = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($resultado);


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Pedidos</title>
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

	  <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	  <div class="panel panel-success" >
	      <div class="panel-heading">
	      <span class="pull-center "><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Nuevo Pedido
	      </div>
	      <br>
	  
	   <form action="formPedido.php" method="GET">
	   <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>" />
	   
	   <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Código Producto</span>
	      <input id="text" type="text" class="form-control" name="cod_prod" value="<?php echo $fila['cod_prod']; ?>" readonly required>
	    </div></div>
	   
	   <div class="col-sm-5">
	   <div class="input-group">
	      <span class="input-group-addon">Descripción</span>
	      <input id="text" type="text" class="form-control" name="descripcion" value="<?php echo $fila['descripcion']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	    <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Importe</span>
	      <input id="text" type="text" class="form-control" name="importe" value="<?php echo $fila['importe']; ?>" readonly required>
	    </div></div>
	    
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Cantidad</span>
	      <input id="number" type="number" class="form-control" name="cantidad" required>
	    </div></div></div></div><hr>
	   
	   <div class="col-sm-5">
	    <div class="input-group">
	    <span class="input-group-addon">Talle</span>
	    <select class="browser-default custom-select" name="talle" required>
	    <option value="" disabled selected>Seleccionar</option>
	    <option value="S">Small</option>
	    <option value="M">Medio</option>
	    <option value="XL">Grande</option>
	    <option value="XXL">Extra Grande</option>
	    <option value="XXXL">Super Grande</option>
	    </select>
	  </div>
	  </div>
	  
	  <div class="container">    
	  <div class="row">
	<div class="col-sm-5">
      <div class="panel panel-default">
        <div class="panel-heading"><?php echo $fila['descripcion']; ?></div>
        <div class="panel-body"><img src="<?php echo $fila['imagen']; ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo $fila['importe']; ?></div>
      </div>
    </div>
	  </div>
	  </div><hr>
	  
	  <div class="panel panel-success" >
	      <div class="panel-heading">
	      <span class="pull-center "><img src="../../icons/status/dialog-information.png"  class="img-reponsive img-rounded"> Datos del Cliente
	      </div>
	      <div class="panel panel-success" >
	      <div class="panel-heading" align="center">
	      <span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded">
	      <p class="text-center">Verifique que sus datos y el producto seleccionado sean los correctos antes de realizar el envío.</p>
	      <p class="text-center">Ya que el producto será entregado en la Dirección cargada previamente por usted.-</p>
	      </div><br>
	  
	  <div class="container">
	  <div class="row">
	  <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Nombre y Apellido</span>
	      <input id="text" type="text" class="form-control" name="cl_nombre" value="<?php echo $linea['nombre']; ?>" readonly required>
	    </div></div>
	    
	    <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Email</span>
	      <input id="email" type="text" class="form-control" name="cl_email" value="<?php echo $linea['email']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	    <div class="container">
	  <div class="row">
	  <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Celular</span>
	      <input id="text" type="text" class="form-control" name="cl_celular" value="<?php echo $linea['celular']; ?>" readonly required>
	    </div></div>
	    
	    <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Dirección</span>
	      <input id="text" type="text" class="form-control" name="cl_direccion" value="<?php echo $linea['direccion']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	    <div class="container">
	  <div class="row">
	  <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Localidad</span>
	      <input id="text" type="text" class="form-control" name="cl_localidad" value="<?php echo $linea['localidad']; ?>" readonly required>
	    </div></div>
	    
	   <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Provincia</span>
	      <input id="text" type="text" class="form-control" name="cl_provincia" value="<?php echo $linea['provincia']; ?>" readonly required>
	    </div></div></div></div><hr>
	  
	  
	  <div class="container">
	   <div class="row">
	   <div class="col-sm-12" align="center">
	  <div class="form-group">
	    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Continuar</button>
	    </div>
	  </div></div></div>
	 </form> 
	  
	  
	  
	  
	  
	  </div>
	  </div>
	  </div>
	



</body>
</html>