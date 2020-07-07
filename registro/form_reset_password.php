
<?php  include '../connection/connection.php'; ?>
<?php  include "../functions/functions.php"; ?>


<html><head>
	<meta charset="utf-8">
	<title>Blanquear Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php skeleton();?>
	
</head>
<body>
<br>
  <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                     <h1><strong>Blanqueo Password</strong></h1>
                     </div>
                    <hr>
                    </div>
                </div>
            </div>
        </div>
        
       <?php
        
       if($conn){
       
	mysqli_select_db('t_shirts');
	  	
	     if(isset($_POST['A'])) {
		$nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
		resetPass($conn,$nombre);
		}
		}else{
		    mysqli_error($conn);
		    }

  //cerramos la conexion
  
  mysqli_close($conn);


?>
<div class="container">
<div class="row">
<div class="col-md-12">
<hr> <a href="../logout.php"><input type="button" value="Ingresar" class="btn btn-primary"></a>
</div>
</div>
</div>


</body>
</html>
