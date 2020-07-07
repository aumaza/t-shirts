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
	
	$fecha = strftime("%d de %b de %Y");
	
	$qry = "select * from pedidos where estado = 'Aprobado'";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$qry);
	//$fila = mysqli_fetch_assoc($res);
	 
?>

<!DOCTYPE HTML>
	  <html lang="es">
	  <head>
	  <title>Planilla - Solicitud Productos</title>
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
	 
	 <style>
	    
	     
	    body {
	    background-color: grey;
	    
	    }
	    h1{
		text-align: center;
		color: grey;
		
	    }
	    
	    h2{
	      text-align: center;
	      color: grey;
	      }
	    table, th, td {
		     border: 1px solid black;
		     border-collapse: collapse;
		     padding: 25px;
		     text-align: center;
		     border-spacing: 5px;
		    
	      }
	      div{
		padding-top: 10px;
		padding-right: 100px;
		padding-bottom: 50px;
		padding-left: 100px;
	      }
	      
	      
	    
	    </style>
	    
	    
	  </head>
	  
	  <body>
	  <hr>
	  <h1>Planilla Pedidos</h1><hr>
	  <h3>Buenos Aires</h3>
	  <p><b>Fecha:</b> <?php echo $fecha; ?></p>
	  <hr>
	  
	  <h2>Pedidos</h2>
	  <div>
	  <?php 
	      echo "<table style='width:100%'>";
              echo "<tr>
		    <th><strong>Cod. Producto</strong></th>
		    <th><strong>Talle</strong></th>
		    <th><strong>Descripción</strong></th>
		    <th><strong>Cantidad</strong></th>
		    </tr>";
		    //</table>";
	  

	while($fila = mysqli_fetch_array($res)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td>".$fila['cod_prod']."</td>";
			 echo "<td>".$fila['talle']."</td>";
			 echo "<td>".$fila['descripcion']."</td>";
			 echo "<td>".$fila['cantidad']."</td>";
			 echo "</tr>"; 
			 }
			 echo "</table>";
	  ?>
	  <hr>
	  <p>T-SHIRTS Streets Casual</p><hr><br>
	  <p>Retiró: </p>
	  <p>Fecha: </p>
	 
	</div>
	</body>
	</html>