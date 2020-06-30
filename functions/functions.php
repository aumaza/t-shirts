<?php
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

            echo "<table class='display compact' id='myTable'>";
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

            echo "<table class='display compact' id='myTable'>";
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

            echo "<table class='display compact' id='myTable'>";
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
	      
            echo "<table class='display compact' id='myTable'>";
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
	$sql = "SELECT * FROM pedidos";
    	mysqli_select_db('t_shirts');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">';
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/wallet-open.png"  class="img-reponsive img-rounded"> Pedidos</div><br>';

            echo "<table class='display compact' id='myTable'>";
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
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../pedidos/cambiarEstado.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Cambiar Estado</a>';
			 echo "</td>";
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

            echo "<table class='display compact' id='myTable'>";
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

            echo "<table class='display compact' id='myTable'>";
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

            echo "<table class='display compact' id='myTable'>";
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



?>

