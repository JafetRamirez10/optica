<?php
	include "views/mostrarProductos.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>OPTICA  ALVAREZ - TIENDA</title>
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
  <script  src="js/script.js"></script>

</head>
<body>
<header>
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="s">QUIENES SOMOS</a>
      </li> -->
      
       <li class="nav-item">
        <a class="nav-link" href="index.php">PRODUCTOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "   data-toggle="modal" data-target="#examenesVista" >EXÁMENES DE LA VISTA</a>
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
	<section class="row section">
		
	</section>
	<div class="row section">
			<div class="col-12 col-md-4">
				<h1 class="col-12 text-justify texto">TIENDA EN LÍNEA</h1>
		<h4 class="col-12 col-md-10 text-center carritoinfo texto "><i class="fas fa-shopping-cart"></i><?php
				if(isset($_SESSION["carritoSlock"])){
						$arreglo=$_SESSION["carritoSlock"];
						 $items=count($arreglo);
					echo ' Total de items: '.$items;
					echo '</h4><a href="productos.php#productosCarrito" class="text-center col-12 col-md-12 texto mb-2">Realizar Pedido</a>';
				}else{
					echo ' Carrito Vacío </h4> ';
				}

		?>
		<div class="col-12">
					<select class=" col-12 col-md-10 pt-2 pb-2 seleccionarGenero permanentMarket">
						<option class="texto" value="todo">Todo</option>
						<option class="texto" value="2">Lentes de Contacto</option>
						<option class="texto" value="1">Soluciones Limpiadoras</option>
						
					</select>
				</div>
				<div class="col-12 mt-2">
					<select class=" col-12 col-md-10 pt-2 pb-2 SeleccionarTipo permanentMarket" style="display: none">
						<option class="texto" value="todo">Todo</option>
						<!-- <option class="texto" value="1">Oftálmicos</option>
						<option class="texto" value="2">De Contacto</option> -->
						<!-- <option class="texto"value ="3">Abstract</option>
						<option class="texto" value="4">Rayas</option> -->
						
					</select>
				</div>

			</div>
			<div class="col-12 col-md-6 ">
				<div class="row mostrarTodosP">

				<?php 
					$mostrarTodos = new ControllerCarrito();
					$mostrarTodos->MostrarTodosProductosController();
				 ?>
				</div>
          <div class="row CategoriasProductos">
          </div>    
     




				</div>
				<!--       <nav aria-label="...">
  <ul class="pagination">
   <li class="page-item">
      <a class="page-link" href="#" tabindex="-1">Anterior</a>
    </li> 
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item ">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
   <li class="page-item">
      <a class="page-link" href="#">Siguiente</a>
    </li> 
  </ul>
</nav> -->
			</div>

		</div>

		</div>
</header>

<!--MODAL DE BOOTSTRAP-->
<div class="modal fade" id="descripcionProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #871A12">
        <h5 class="modal-title permanentMarket" id="exampleModalLabel" style="color: white">Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-12 col-md-6 imagen">
        		<img src="img/articulo/1.png" class="img-fluid imagenDescripcion">
        	</div>
        	<div class="col-12 col-md-6 descripcion">
        		<h2 class="texto nombre" style="font-size:18px">Nombre del Producto</h2>
        		<p class="descripcion1">Producto de Calida, 100% correcto</p>
        		<h6 class="precio">Precio: ₡500</h6>
        		<label>Cant:</label><input type="number" name="cantidad" class="col-12 col-md-5 cantidad" min="1">
        		<input type="hidden" name="" class="IdProducto">
            <input type="hidden" name="" class="GeneroE">
            <input type="hidden" name="" class="TipoE">
            <div class="form-group coloresLentes" style="display:none">
             <label>Color:</label>
             <select class="form-control" id="ColorLentes">
               <option value="cafe">Café </option>
                <option value="negro">Negro </option>
             </select>
            </div>
        	</div>
      </div>
    </div>
     		<div class="alert alert-success aviso" role="alert" style="display:none;">
  <strong>Se agrego el producto!</strong>
</div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-danger añadirCarrito">Añadir al carrito</button>
        <a href="productos.php#productosCarrito"><button type="button" class="btn btn-warning">Ver el carrito</button></a>
         <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!-- FIN DE BOOTSTRAP-->
   <?php 
      include "examenvista.php";

    ?>
</div>
</body>
</html>