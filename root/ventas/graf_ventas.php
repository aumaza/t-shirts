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
	// total importe sobre ventas realizadas
	$sql = "select sum(importe) as total from pedidos where estado = 'Aprobado'";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($res)){
		  $total = $row['total'];
	}
	
	//total importe sobre pedidos stand-by
	$query = "select sum(importe) as total from pedidos where estado = 'stand-by'";
	mysqli_select_db('t_shirts');
	$resp = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($resp)){
		  $imp_ped = $row['total'];
	    }
	
	//cantidad productos pedidos en estado stand-by
	$sq = "select count(cod_prod) as productos from pedidos where estado = 'stand-by'";
	mysqli_select_db('t_shirts');
	$res = mysqli_query($conn,$sq);
	while($row = mysqli_fetch_array($res)){
		$count = $row['productos'];
	}
	
	// los 10 productos mas pedidos

	$ql = "select cod_prod, sum(cantidad) as totalcant from pedidos group by cod_prod order by sum(cantidad) DESC limit 1";
	mysqli_select_db('t_shirts');
	$resval = mysqli_query($conn,$ql);
	while($row = mysqli_fetch_array($resval)){
		$articulo = $row['cod_prod'];
		$counter = $row['totalcant'];
	}
	

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gráficos - Estadísticas de Ventas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../icons/actions/view-statistics.png" />
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
    <h2>Online Store - Análisis Estadísticos</h2>
    <a href="../main/main.php"><button class="btn btn-default"><img src="../../icons/actions/arrow-left.png" /><strong> Volver</strong></button></a>
  </div>
</div><br>


<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">Importe Total sobre Ventas Finalizadas</div>
        <div class="panel-body">
         <canvas id="myChart" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['Importe'],
        datasets: [{
            label: 'Total Vendido en Pesos',
            data: [<?php echo $total;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
        </div>
        <div class="panel-footer">* Valores expresados en Pesos</div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Importe Total sobre Pedidos</div>
        <div class="panel-body">
        <canvas id="myChart2" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart2');
var colors = ['#007bff','#28a745','#444444','#c3e6cb','#dc3545','#6c757d','#FFA858','#C0C0FF'];
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Importe'],
        datasets: [{
            label: 'Total Pedidos en Pesos',
            data: [<?php echo $imp_ped;?>],
            backgroundColor: colors[5],
            borderColor: colors[1],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
        </div>
        <div class="panel-footer">* Valores expresados en Pesos</div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Cantidad de Pedidos en Stand-By</div>
        <div class="panel-body">
        <canvas id="myChart3" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart3');
var colors = ['#007bff','#28a745','#444444','#c3e6cb','#dc3545','#6c757d','#FFA858','#C0C0FF'];
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pedidos'],
        datasets: [{
            label: 'Total Pedidos Stand-By',
            data: [<?php echo $count;?>],
            backgroundColor: colors[5],
            borderColor: colors[6],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
        </div>
        <div class="panel-footer">Cantidad de Pedidos</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">Artículo más pedido</div>
        <div class="panel-body">
        <canvas id="myChart4" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart4');
var colors = ['#007bff','#28a745','#444444','#c3e6cb','#dc3545','#6c757d','#FFA858','#C0C0FF'];
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['<?php echo $articulo;?>'],
        datasets: [{
            label: 'Artículo más Pedido',
            data: [<?php echo $counter;?>],
            backgroundColor: colors[5],
            borderColor: colors[7],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
        </div>
        <div class="panel-footer">Más Pedido: <?php echo $articulo;?> Cantidad: <?php echo $counter;?></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera Rocky Balboa (Blanca)</div>
        <div class="panel-body"><img src="../../pics/pic09.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Remera Rolling Stones (Negra)</div>
        <div class="panel-body"><img src="../../pics/pic08.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Importe: $400</div>
      </div>
    </div>
  </div>
</div><br><br>


     


</body>
</html>