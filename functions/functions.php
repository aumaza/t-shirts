<?php

/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/t-shirts/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/t-shirts/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/Chart.js/Chart.min.css" >
	<link rel="stylesheet" href="/t-shirts/skeleton/Chart.js/Chart.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="/t-shirts/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/t-shirts/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/t-shirts/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/t-shirts/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/t-shirts/skeleton/js/dataTables.select.min.js"></script>
	<script src="/t-shirts/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/t-shirts/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/t-shirts/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/t-shirts/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/t-shirts/skeleton/Chart.js/Chart.js"></script>';
}


/*
* Funcion para agregar usuarios al sistema
*/

function agregarUser($nombre,$user,$pass1,$pass2,$role,$conn){

	mysqli_select_db('t_shirts');	

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password,role)".
		"VALUES ".
      "('$nombre','$user','$pass1','$role')";
		


	if(strcmp($pass2, $pass1) == 0){
		mysqli_query($conn,$sqlInsert);	
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Usuario Creado Satisfactoriamente';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
		echo "</div>";
		echo "</div>";
	}
}

/*
* Funcion para editar la contraseña de los usuarios al sistema
*/

function updatePass($id,$pass1,$pass2,$conn){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE id = '$id'";
    	mysqli_select_db('t_shirts');
    	
    	
    	if(strcmp($pass2, $pass1) == 0){
    		
		      mysqli_query($conn,$sql);
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Password Actualizado Satisfactoriamente<br>';
			echo 'Aguarde un Instante que será redirigido';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo '<meta http-equiv="refresh" content="4;URL=http:../main/main.php "/>';
			
	   	}else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-danger" role="alert">';
			echo "Las Contraseñas no Coinciden. Intente Nuevamente!<br>";
			echo 'Aguarde un instante que será redirigido';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo '<meta http-equiv="refresh" content="4;URL=http:../main/main.php "/>';
			
			
			

    	}

    
}

/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

function cambiarPermisos($id,$role,$conn){

  $sql = "UPDATE usuarios set role = '$role' where id = '$id'";
  mysqli_select_db('t_shirts');
  
  if($user){
    mysqli_query($conn,$sql);
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Rol Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
	  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "El usuario no existe. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
 
}


/*
* Funcion para mostrar los datos del usuario administrador.-
*/

function loadRoot($nombre,$conn){


if($conn)
{
	$sql = "SELECT * FROM usuarios where nombre = '$nombre'";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila

	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/meeting-chair.png"  class="img-reponsive img-rounded"> Mis Datos</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>Usuario</th>
                    <th class='text-nowrap text-center'>Role</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['user']."</td>";
			 echo "<td align=center>".$fila['role']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../usuario/editPassword.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span> Cambiar Password</a>';echo "</td>";
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}

/*
* Funcion para mostrar los datos de usuario.-
*/

function loadUser($nombre,$conn){


if($conn)
{
	$sql = "SELECT * FROM clientes where nombre = '$nombre'";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila

	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Mis Datos</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>E-mail</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th class='text-nowrap text-center'>Provincia</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['provincia']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../usuario/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="../usuario/editPassword.php?nombre='.$fila['nombre'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span> Cambiar Password</a>';
			 echo "</td>";
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los datos de usuarios.-
*/

function loadUsers($conn){


if($conn)
{
	$sql = "SELECT * FROM clientes";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Clientes</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>E-mail</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Clientes:  ' .$count; echo '</button>';
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los pedidos de usuario.-
*/

function loadUserAsk($nombre,$conn){


if($conn)
{
	$sql = "SELECT * FROM pedidos where cliente = '$nombre'";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/wallet-open.png"  class="img-reponsive img-rounded"> Mis Pedidos</div><br>';

	      echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo '<span class="pull-center "><img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> <strong>Importante:</strong> A partir del momento en que el estado del Pedido sea "Aprobado", tendrá una demora de 4 a 7 días para la entrega.';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
	      
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Fecha Compra</th>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
		    <th class='text-nowrap text-center'>Talle</th>
                    <th class='text-nowrap text-center'>Descipción</th>
                    <th class='text-nowrap text-center'>Importe</th>
                    <th class='text-nowrap text-center'>Cantidad</th>
                    <th class='text-nowrap text-center'>Cliente</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Direccion</th>
                    <th class='text-nowrap text-center'>Localidad</th>
		    <th class='text-nowrap text-center'>Provincia</th>
                    <th class='text-nowrap text-center'>Estado</th>
                    <th class='text-nowrap text-center'>Actualización Estado</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['f_pedido']."</td>";
			 echo "<td align=center>".$fila['cod_prod']."</td>";
			 echo "<td align=center>".$fila['talle']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['importe']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['provincia']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['update_est']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo ' <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-qrcode"></span> QR</button>';
			 $count++;
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pedidos:  ' .$count; echo '</button>';
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los pedidos de usuario.-
*/

function loadAsk($conn){


if($conn)
{
	$sql = "SELECT * FROM pedidos where estado = 'stand-by'";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/wallet-open.png"  class="img-reponsive img-rounded"> Pedidos</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Fecha Compra</th>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
		    <th class='text-nowrap text-center'>Talle</th>
                    <th class='text-nowrap text-center'>Descipción</th>
                    <th class='text-nowrap text-center'>Importe</th>
                    <th class='text-nowrap text-center'>Cantidad</th>
                    <th class='text-nowrap text-center'>Cliente</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Direccion</th>
                    <th class='text-nowrap text-center'>Localidad</th>
		    <th class='text-nowrap text-center'>Provincia</th>
                    <th class='text-nowrap text-center'>Estado</th>
                    <th class='text-nowrap text-center'>Actualización Estado</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['f_pedido']."</td>";
			 echo "<td align=center>".$fila['cod_prod']."</td>";
			 echo "<td align=center>".$fila['talle']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['importe']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['provincia']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['update_est']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../pedidos/cambiarEstado.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Cambiar Estado</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pedidos:  ' .$count; echo '</button>';
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los pedidos de usuario.-
*/

function loadVentas($conn){


if($conn)
{
	$sql = "SELECT * FROM pedidos where estado = 'Aprobado'";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-income-categories.png"  class="img-reponsive img-rounded"> Ventas</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Fecha Compra</th>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
		    <th class='text-nowrap text-center'>Talle</th>
                    <th class='text-nowrap text-center'>Descipción</th>
                    <th class='text-nowrap text-center'>Importe</th>
                    <th class='text-nowrap text-center'>Cantidad</th>
                    <th class='text-nowrap text-center'>Cliente</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Direccion</th>
                    <th class='text-nowrap text-center'>Localidad</th>
		    <th class='text-nowrap text-center'>Provincia</th>
                    <th class='text-nowrap text-center'>Estado</th>
                    <th class='text-nowrap text-center'>Actulización Estado</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['f_pedido']."</td>";
			 echo "<td align=center>".$fila['cod_prod']."</td>";
			 echo "<td align=center>".$fila['talle']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['importe']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['provincia']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['update_est']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../ventas/comprobante.php?id='.$fila['id'].'" target="_blank" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print"></span> Imprimir Comprobante</a>';
			 echo '<a href="../pedidos/cambiarEstado.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span> Cambiar Estado</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../ventas/solicitud.php" target="blank"><button type="button" class="btn btn-success"><span class="pull-center "><img src="../../icons/mimetypes/application-epub+zip.png"  class="img-reponsive img-rounded"> Emitir Pedido</button></a><br><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Ventas:  ' .$count; echo '</button>';
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los pedidos de usuario.-
*/

function loadEntregas($conn){


if($conn)
{
	$sql = "SELECT * FROM pedidos where estado = 'Entregado'";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/mail-mark-notjunk.png"  class="img-reponsive img-rounded"> Productos Entregados</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Fecha Compra</th>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
		    <th class='text-nowrap text-center'>Talle</th>
                    <th class='text-nowrap text-center'>Descipción</th>
                    <th class='text-nowrap text-center'>Importe</th>
                    <th class='text-nowrap text-center'>Cantidad</th>
                    <th class='text-nowrap text-center'>Cliente</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Direccion</th>
                    <th class='text-nowrap text-center'>Localidad</th>
		    <th class='text-nowrap text-center'>Provincia</th>
                    <th class='text-nowrap text-center'>Estado</th>
                    <th class='text-nowrap text-center'>Actualización Estado</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['f_pedido']."</td>";
			 echo "<td align=center>".$fila['cod_prod']."</td>";
			 echo "<td align=center>".$fila['talle']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['importe']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['provincia']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['update_est']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Ventas:  ' .$count; echo '</button>';
		echo '</div>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}

/*
* Funcion para mostrar localidades.-
*/

function addLocalidad($conn){


if($conn)
{
	$sql = "SELECT * FROM localidades";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-warning" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/flag-blue.png"  class="img-reponsive img-rounded"> Localidades';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cod. Localidad</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cod_loc']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../localidades/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="#" data-href="../localidades/eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../localidades/nuevoRegistro.php"><button type="button" class="btn btn-default"><span class="pull-center "><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Localidad</button></a><br><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}

/*
* Funcion para mostrar productos.-
*/


function addProductos($conn){


if($conn)
{
	$sql = "SELECT * FROM productos";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/feed-subscribe.png"  class="img-reponsive img-rounded"> Productos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Producto</th>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
		    <th class='text-nowrap text-center'>Tipo</th>
		    <th class='text-nowrap text-center'>Descripción</th>
                    <th class='text-nowrap text-center'>Precio</th>
                    
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center><img src='$fila[imagen]' alt='Avatar' class='avatar' ></td>"; 
			 echo "<td align=center>".$fila['cod_prod']."</td>";
			 echo "<td align=center>".$fila['tipo']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>$ ".$fila['importe']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../productos/addImage.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-upload"></span> Cargar Imagen</a>';
			 echo '<a href="../productos/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="#" data-href="../productos/eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../productos/nuevoRegistro.php"><button type="button" name="N" class="btn btn-default"><span class="pull-center "><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Producto</button></a><br><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		      
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}



/*
* Funcion para lista productos.-
*/

function productos($conn){


if($conn)
{
	$sql = "SELECT * FROM productos";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/feed-subscribe.png"  class="img-reponsive img-rounded"> Productos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Producto</th>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
		    <th class='text-nowrap text-center'>Tipo</th>
		    <th class='text-nowrap text-center'>Descripción</th>
                    <th class='text-nowrap text-center'>Precio</th>
                    
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center><img src='$fila[imagen]' alt='Avatar' class='avatar' ></td>"; 
			 echo "<td align=center>".$fila['cod_prod']."</td>";
			 echo "<td align=center>".$fila['tipo']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>$ ".$fila['importe']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../productos/newPedido.php?id='.$fila['id'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span> Comprar</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>
		      </div>
		      </div>
		      </div>';
		      
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}

/*
** Funcion analisis de ventas
*/

function ventas_stats($conn){

    $sql = "select sum(importe) as total from pedidos where estado = 'Aprobado'";
    mysqli_select_db('t_shirts');
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
	      $total = $row['total'];
	}
	
    $query = "select sum(importe) as total from pedidos where estado = 'stand-by'";
    mysqli_select_db('t_shirts');
    $resp = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($resp)){
	      $imp_ped = $row['total'];
	}
	
    $qry = "select count(cod_prod) as productos from pedidos where estado ='stand-by'";
    mysqli_select_db('t_shirts');
    $retval = mysqli_query($conn,$qry);
    while($row = mysqli_fetch_array($retval)){
	      $prod = $row['productos'];
    }
	// articulo producto mas pedido
	$ql = "select cod_prod, sum(cantidad) as totalcant from pedidos group by cod_prod order by sum(cantidad) DESC limit 1";
	mysqli_select_db('t_shirts');
	$resval = mysqli_query($conn,$ql);
	while($row = mysqli_fetch_array($resval)){
		$articulo = $row['cod_prod'];
		$counter = $row['totalcant'];
	}
	
	// 3 clientes con mas pedidos
	$q = "select cliente, count(cliente) as times from pedidos where estado = 'stand-by' group by cliente order by count(cliente) DESC limit 0, 3";
	mysqli_select_db('t_shirts');
	$ret = mysqli_query($conn,$q);
	
echo '<div class="container">
      <div class="row">
      <div class="col-sm-12">
      <div class="alert alert-success" role="alert">
	       <img class="img-reponsive img-rounded" src="../../icons/actions/office-chart-bar.png" /> Análisis de Ventas
	       </div><hr>
	       <a href="../ventas/graf_ventas.php"><button type="button" class="btn btn-default"><span class="pull-center "><img src="../../icons/actions/view-statistics.png"  class="img-reponsive img-rounded"> Ver Gráficos</button></a>
	       <hr>

   <div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading"><img class="img-reponsive img-rounded" src="../../icons/actions/view-financial-transfer.png" /> Total Ventas Finalizadas</div>
        <div class="panel-body" align="center">
       </div>
        <div class="panel-footer">Importe: $'.$total.'  </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><img class="img-reponsive img-rounded" src="../../icons/actions/view-pim-tasks.png" />Total Pedidos</div>
        <div class="panel-body" align="center">
       </div>
        <div class="panel-footer">Importe: $'.$imp_ped.'</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><img class="img-reponsive img-rounded" src="../../icons/actions/preferences-activities.png" /> Cantidad Pedidos Stand-By</div>
        <div class="panel-body"></div>
        <div class="panel-footer">Cantidad: '.$prod.'</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading"><img class="img-reponsive img-rounded" src="../../icons/actions/rating.png" /> Articulo más Pedido</div>
        <div class="panel-body"></div>
        <div class="panel-footer">Artículo: '.$articulo. ' Cantidad: ' .$counter.'</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Clientes con más Pedidos</div>
        <div class="panel-body">
        
        <table class="display compact" style="width:100%" id="myTable">
		    <thead>
		    <th class="text-nowrap text-center">Cliente</th>
		    <th class="text-nowrap text-center">Cantidad Pedidos</th>
		    <th>&nbsp;</th>
                    </thead>';


	while($fila = mysqli_fetch_array($ret)){
			  // Listado normal
			echo '<tr>
			 <td align=center>'.$fila['cliente'].'</td>
			 <td align=center>'.$fila['times'].'</td>
			 <td class="text-nowrap">
			 </td>';
			 
		}

		echo '</table>
        
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera Rolling Stones (Negra)</div>
        <div class="panel-body"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
  </div>
</div><br><br>


</div></div></div>';


}


?>

