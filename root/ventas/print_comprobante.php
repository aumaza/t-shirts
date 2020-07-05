<?php include "../../connection/connection.php";
  
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
	
	$id = $_GET['id'];
	$qry = "select * from pedidos where id = '$id'";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$qry);
	$fila = mysqli_fetch_assoc($res);
	 
?>

<!DOCTYPE HTML>
	  <html lang="es">
	  <head>
	  <title>Comprobante</title>
	  <meta charset="UTF-8"/>
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
	  </head>
	  
	  <body>
	  <h1>Comprobante de Pago</h1>
	  <p><b>Fecha de Compra:</b> <?php echo $fila['f_pedido'];?></p>
	  <hr>
	  
	  <h2>Datos del Producto</h2>
	  <p><b>Producto:</b> <?php echo $fila['descripcion'];?></p>
	  <p><b>Código de Producto:</b> <?php echo $fila['cod_prod']; ?></p>
	  <p><b>Talle:</b> <?php echo $fila['talle']; ?></p>
	  <p><b>Cantidad:</b> <?php echo $fila['cantidad']; ?></p>
	  <p><b>Importe: $</b><?php echo $fila['importe']; ?></p><hr>
	  
	  <h2>Datos del Cliente</h2>
	  <p><b>Cliente:</b> <?php echo $fila['cliente']; ?></p>
	  <p><b>Email:</b> <?php echo $fila['email']; ?></p>
	  <p><b>Celular:</b> <?php echo $fila['celular']; ?></p>
	  <p><b>Dirección:</b> <?php echo $fila['direccion']; ?></p>
	  <p><b>Localidad:</b> <?php echo $fila['localidad']; ?></p>
	  <p><b>Provincia:</b> <?php echo $fila['provincia']; ?></p><hr>
	  <h3>Gracias por su Compra</h3>
	  
	
	</body>
	</html>