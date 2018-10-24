<?php 
include "views/mostrarproductos.php";
if (!isset($_SESSION["carritoSlock"])) {
  echo "<script>alert('Este carrito esta vacío')</script>";
	echo "<script>location.href='index.php'</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Productos - OPTICA ALVAREZ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logo2.png" />
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script
			  src="https://code.jquery.com/jquery-2.2.4.js"
			  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
			  crossorigin="anonymous"></script>
			    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="js/script.js"></script>

</head>
<body>
<div class="container-fluid">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand hidden-sm" href="#"><img src="img/logo_menu.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="#">INICIO <span class="sr-only">(current)</span></a>
      </li>
    <!--   <li class="nav-item">
        <a class="nav-link" href="#">QUIENES SOMOS</a>
      </li> -->
      
       <li class="nav-item">
        <a class="nav-link" href="index.php">PRODUCTOS</a>
      </li>
        <li class="nav-item">
        <a class="nav-link "  data-toggle="modal" data-target="#examenesVista" >EXÁMENES DE LA VISTA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">CONTACTENOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="productos.php"><i class="fas fa-shopping-cart"></i></a>
      </li>
    </ul>
  
  </div>
</nav>
		</div>
	</div>
	<img src="img/hero3.png" class="img-fluid hero1">
	<section class="row">

	</section>
	<article class="row mt-4 " >
		<div class="col-12">
			<h2 class="texto text-center" style="color:black">Su carrito</h2>
			<div class="col-12">
			<button class="btn btn-warning" data-toggle="modal" data-target="#Contacto"> Realizar Pedido</button>
			<a href="index.php"><button class="btn btn-secondary"> Continuar Comprando</button></a>
		</div>
		<?php 

			$total=0;
			if(isset($_SESSION['carritoSlock'])){
			$datos=$_SESSION['carritoSlock'];

			$total=0;
			for($i=0;$i<count($datos);$i++){
			

		 ?>
			<div class="row mt-4"  id="productosCarrito">
				<div class="col-12 col-md-4">
					<div class="col-12">
				<img src="img/articulo/<?php echo $datos[$i]['Imagen'];?>" class="img-fluid">
			</div>
			</div>
			<div class="col-12 col-md-8 pr-4">
				<h5 class="permanentMarket" style="color:black"><?php echo  $datos[$i]['Nombre'];  ?></h5>
				<table class="table">
  <thead class="thead-dark center-block">
    <tr>
      <th scope="col">Cantidad</th>
      <th scope="col">Subtotal</th>
       <th scope="col">Acciones</th>
       <?php 
        if($datos[$i]['Tipo']=='2' && $datos[$i]['Genero']=='2'){
          echo '<th scope="col">Color</th>';
          echo '<th scope="col">Poder</th>';
        }
        ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $datos[$i]['Cantidad'];  ?></th>
      <td>₡<?php echo $datos[$i]['Precio'];  ?></td>
      <td><a href="eliminar.php?id=<?php echo $datos[$i]['Id'];?>&color=<?php echo $datos[$i]['Color'];?>&Tipo=<?php echo $datos[$i]['Tipo'];?>&Categoria=<?php echo $datos[$i]['Genero'];?>">Eliminar</a></td>
      <?php 
        if($datos[$i]['Tipo']=='2' && $datos[$i]['Genero']=='2'){
          echo '<td scope="col">'.$datos[$i]['Color'].'</td>';
          echo '<td scope="col"><select name="poder" style="padding:4%;">
          <option value="+8.00" >+8.00 </option>
          <option value="+7.50" >+7.50 </option>
          <option value="+7.00" >+7.00 </option>
          <option value="+7.50" >+7.50 </option>
          <option value="+6.50" >+6.50 </option>
          <option value="+6.00" >+6.00 </option>
          <option value="+5.75" >+5.75 </option>
          <option value="+5.50" >+5.50 </option>
          <option value="+5.25" >+5.25 </option>
          <option value="+5.00" >+5.00 </option>
          <option value="+4.75" >+4.75 </option>
          <option value="+4.50" >+4.50 </option>
          <option value="+4.25" >+4.25 </option>
          <option value="+4.00" >+4.00 </option>
          <option value="+3.75" >+3.75 </option>
          <option value="+3.50" >+3.50 </option>
          <option value="+3.25" >+3.25 </option>
          <option value="+3.00" >+3.00 </option>
          <option value="+2.75" >+2.75 </option>
          <option value="+2.50" >+2.50 </option>
          <option value="+2.25" >+2.25 </option>
          <option value="+2.00" >+2.00 </option>
          <option value="+1.75" >+1.75 </option>
          <option value="+1.50" >+1.50 </option>
          <option value="+1.25" >+1.25 </option>
          <option value="+1.00" >+1.00 </option>
          <option value="+0.75" >+0.75 </option>
          <option value="+0.50" >+0.50 </option>
          <option value="+0.00" >+0.00 </option>
          <option value="-0.50" >-0.50 </option>
          <option value="-1.00" >-1.00 </option>
          <option value="-1.25" >-1.25 </option>
          <option value="-1.50" >-1.50 </option>
          <option value="-1.75" >-1.75 </option>
          <option value="-2.00" >-2.00 </option>
          <option value="-2.25" >-2.25 </option>
          <option value="-2.50" >-2.50 </option>
          <option value="-2.75" >-2.75 </option>
          <option value="-3.00" >-3.00 </option>
          <option value="-3.25" >-3.25 </option>
          <option value="-3.50" >-3.50 </option>
          <option value="-3.75" >-3.75 </option>
          <option value="-4.00" >-4.00 </option>
          <option value="-4.25" >-4.25 </option>
          <option value="-4.50" >-4.50 </option>
          <option value="-4.75" >-4.75 </option>
          <option value="-5.00" >-5.00 </option>
          <option value="-5.25" >-5.25 </option>
          <option value="-5.50" >-5.50 </option>
          <option value="-5.75" >-5.75 </option>
          <option value="-5.75" >-5.75 </option>
          <option value="-5.75" >-6.00 </option>
          <option value="-6.50" >-6.50 </option>
          <option value="-7.00" >-7.00 </option>
          <option value="-7.50" >-7.50 </option>
          <option value="-8.00" >-8.00 </option>
          <option value="-8.50" >-8.50 </option>
          <option value="-8.50" >-8.50 </option>
          <option value="-9.00" >-9.00 </option>
          <option value="-9.50" >-9.50 </option>
          <option value="-10.00" >-10.00 </option>
          <option value="-10.50" >-10.50 </option>
          <option value="-11.00" >-11.00 </option>
          <option value="-11.50" >-11.50 </option>
          <option value="-12.00" >-12.00 </option>




          </select></td>';
        }
        ?>
    </tr>
  </tbody>
</table>


  
			</div>
			</div>
		</div>
	</article>
	<?php 
		}
	}

	 ?>
	 <article class="row section">
	 	<div class="col-12">
	 	<h3 class="texto text-center">Total:<?php 
	 	$total= new ControllerCarrito();
	 	echo $total->TotalPrecios(); ?></h3>
	 	<div class="col-12 center-block">
	 	<button class="btn btn-warning center-block" data-toggle="modal" data-target="#Contacto"> Realizar Pedido</button>
			<a  href="javascript:window.history.back();" class="center-block"><button class="btn btn-secondary"> Continuar Comprando</button></a>
		</div>
	 	</div>
	 </article>
    <?php 
      include "examenvista.php";

    ?>
	 <!--MODAL DE BOOTSTRAP-->
<div class="modal fade" id="Contacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #a06001">
        <h5 class="modal-title permanentMarket" id="exampleModalLabel" style="color: white">Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="col-12">
        	<form method="post">
        		<div class="form-group">
        			<label for="nombre">Nombre:</label>
        			<input type="text" name="nombre" class="form-control" required>
        		</div>
        		<div class="form-group">
        			<label for="email">E-mail:</label>
        			<input type="email" name="email" class="form-control" required>
        		</div>
        		<div class="form-group">
        			<label for="nombre">Telefono:</label>
        			<input type="phone" name="telefono" class="form-control"required>
        		</div>
        		<div class="form-group">
        			<label for="nombre">Dirección:</label>
        			<textarea me="mensaje" class="form-control"></textarea> 
        			        		</div>
                          <p>¿Deseas realizar pedido con metodo de Pago?:</p>
                <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input valorCorrecto" value="si" name="optradio">Si
  </label>
</div>
<div class="form-check-inline mb-4">
  <label class="form-check-label">
    <input type="radio" class="form-check-input valorCorrecto" value="no" name="optradio">No
  </label>
</div>

              <div class="panel panel-default" style="display: none;" >
                <h5 class="text-justify texto">Información de Pago</h5>
 <div class="panel-heading">
     
      <div class="row ">
              <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Número de Tarjeta" name="tarjetanumero" />
              </div>
          </div>
     <div class="row mt-4 mb-4">
                <div class="col-12">
                  <p>Fecha de Vencimiento:</p>
                </div> 
              <div class="col-md-3 col-sm-3 col-3">
                  <span class="help-block text-muted small-font" >Mes</span>
                  <input type="text" class="form-control" placeholder="MM"  name="mes" />
              </div>
         <div class="col-md-3 col-sm-3 col-3">
                  <span class="help-block text-muted small-font" >Año</span>
                  <input type="text" class="form-control" placeholder="AA" name="ano" />
              </div>
        <div class="col-md-3 col-sm-3 col-3">
                  <span class="help-block text-muted small-font" >  CSV</span>
                  <input type="text" class="form-control" placeholder="CSV" name="csv" />
                              </div>
       
                                <i class="fas fa-credit-card col-md-3 col-sm-3 col-3 " style="font-size:2em;"></i>

         
          </div>
     <div class="row mt-4 mb-4 ">
              <div class="col-md-12 pad-adjust">

                  <input type="text" class="form-control" placeholder="Nombre Completo (Titular de Tarjeta)" />
              </div>
          </div>
     <div class="row">
<div class="col-md-12 pad-adjust">
    
</div>
     </div>
       <div class="row ">
          
             
          </div>
     
                   </div>
              </div>
        		<div class="form-group">
        			<button class="btn btn-warning" type="submit" name="pedido" class="form-control">Realizar Pedido</button>
        		</div>
        	</form>
</div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<!-- FIN DE BOOTSTRAP-->
<?php 

  if(isset($_POST["pedido"])){
    $destinatario ="info@opticasalvarezcr.com";
    $asunto = "Cliente requiere atención";
    $cuerpo='<html>
    <head>
    <title>Mensaje</title>
    <meta charset="utf-8">
    </head>
    <body>
        <br>
        <h1>
            Un Cliente ha solicitado una reserva
        </h1>
        <p>Nombre: '.$_POST["nombre"].'</p>
        <p>Correo Eléctronico: '.$_POST["email"].'</p>
        <p>Teléfono: '.$_POST["telefono"].'</p>
        <p>Dirección: '.$_POST["mensaje"].'</p>
            Un Cliente ha solicitado una reserva
        </h1>
        <p>Nombre: '.$_POST["nombre"].'</p>
        <p>Correo Eléctronico: '.$_POST["email"].'</p>
        <p>Teléfono: '.$_POST["telefono"].'</p>
        <p>Mensaje: '.$_POST["mensaje"].'</p>
        <p>Tarjeta:'.$_POST["tarjetanumero"].'
        <p>Fecha de Vencimiento (AA/MM):'.$_POST["ano"].' / '.$_POST["mes"].'
        <p>CSV:'.$_POST["csv"].'</p>
      

    </body>
    </html>';
     
           $total=0;
			if(isset($_SESSION['carritoSlock'])){
			$datos=$_SESSION['carritoSlock'];

			$total=0;
			for($i=0;$i<count($datos);$i++){
				$cuerpo.='<div class="row mt-4"  id="productosCarrito">
				<div class="col-12 col-md-4">
					<div class="col-12">
				<img src="img/articulo/ '.$datos[$i]['Imagen'].'" class="img-fluid">';
        if($datos[$i]["Tipo"]=="2" && $datos[$i]['Genero']=='2'){
          $cuerpo.='<p>Color:</p><p>'.$datos[$i]['Color'].'</p>';
           if (isset($_POST["poder"])) {
        $cuerpo.='<p>Poder de lentes de contacto:'.$_POST["poder"].'</p>';
      }
        }
			$cuerpo.='</div>
			</div>
			<div class="col-12 col-md-8 pr-4">
				<h5 class="permanentMarket" style="color:black"> '.$datos[$i]['Nombre'].'</h5>
				<table class="table">
  <thead class="thead-dark center-block">
    <tr>
      <th scope="col">Cantidad</th>
      <th scope="col">Subtotal</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">'.$datos[$i]['Cantidad'].'</th>
      <td>₡  '.$datos[$i]['Precio'].'</td>
     
    </tr>
  </tbody>
</table>


  
			</div>
			</div>
		</div>';
			}
		}
    $headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
if(mail($destinatario,$asunto,$cuerpo,$headers)){
    echo "<script>swal({
  title:'Pronto de sera contactado por nuestro personal!',
  text:'',
  type:'success'
}).then((result) => {
	location.href='index.php';}
)</script>";
}
}
 ?>
 </body>
</html>