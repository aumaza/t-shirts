<?php include "../functions/functions.php";?>


<html style="height: 100%"><head>
	<meta charset="utf-8">
	<title>Blanquear Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../icons//status/dialog-password.png" />
	<?php skeleton();?>
	
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
<body >
<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    
                    <div class="alert alert-success" role="alert">
                     <h1><strong>Importante: </strong></h1>
                     <h3>Por favor ingrese los datos solicitados para poder blanquear su Password</h3>
                     <h4>Recuerde ingresar su nombre tal cual lo ingresó cuando se registró</h4>
                    </div>
                    <hr>
                          
 <form action="form_reset_password.php" method="post">
 
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="nombre" onkeyup="this.value=Text(this.value);" placeholder="Nombre y Apellido" required>
  </div><br>
  <div class="input-group">
    <button type="submit" class="btn btn-success" name="A"><span class="glyphicon glyphicon-ok"></span> Enviar</button>
  </div>
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

