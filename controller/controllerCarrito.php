<?php  
session_start();
Class ControllerCarrito{
	//Mostrar todos los productos
	public static function MostrarTodosProductosController(){
		$respuesta=ModelsCarrito::MostrarTodosProductos();
		if($respuesta==0){
			echo 0;
		}else{
			foreach ($respuesta as $row => $item) {
				echo '	<div class="col-12 col-md-4 mt-4 mb-4 todos">
					<span><img src="img/articulo/'.$item["imagen"].'" class="img-fluid descripcionArticulo" id="noajax">
					<h6 class="text-center nombre permanentMarket " style="color:#871A12;">'.$item["nombre"].'</h6>
					<input type="hidden" class="id" value="'.$item["id"].'"> 
					<div class="col-12 center-block">
					 	<input type="hidden" value="'.$item["genero"].'" class="generoProducto">
					 	<input type="hidden" value="'.$item["tipo"].'" class="tipoProducto">
						<label class="precio" >Precio: ₡'.$item["precio"].'</label><br>
						<span><img src="img/articulo/'.$item["imagen"].'" class="img-fluid" style="display:none">
						<h6 class="text-center nombre permanentMarket " style="color:#871A12; display:none">'.$item["nombre"].'</h6>
						<input type="hidden" class="id" value="'.$item["id"].'"> 
						<label>Cant:</label><input type="number" name="cantidad" min="1" class="col-12 col-md-5 cantidad" value="1">
						<input type="hidden" value="'.$item["descripcion"].'" class="descripcion"></span>
					<span class="carritoproducto descripcionArticulo" id='.$item["id"].'><i class="fas fa-shopping-cart"></i></span></div>
					
				</div>';
			}
		}
	}
	public static function AnadirProductoController($idproducto,$cantidad,$genero,$tipo,$color){
		
		if(is_numeric($cantidad)){
			$nombre="";
			$precio=0;
			$imagen="";
			$descripcion="";
			$respuesta=ModelsCarrito::AnadirProductoModels($idproducto,"productos");
			if($respuesta==0){
				return 0;
			}else{
				if(isset($_SESSION['carritoSlock'])){
					if ($idproducto!="") {
						$arreglo=$_SESSION['carritoSlock'];
						$encontro=false;
						$numero=0;
						for ($i=0; $i <count($arreglo) ; $i++) { 
								if($arreglo[$i]['Id']==$idproducto){
									if($arreglo[$i]['Color']==$color){
										$encontro=true;
										$numero=$i;
									}
								}
					}
					if($encontro==true){
							$arreglo[$numero]['Precio']=$arreglo[$numero]['Precio']/$arreglo[$numero]['Cantidad'];
							$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+$cantidad;
							 $arreglo[$numero]['Precio']=$arreglo[$numero]['Precio']*$arreglo[$numero]['Cantidad'];
							$_SESSION['carritoSlock']=$arreglo;
							
									}
					else{
							$nombre="";
							$precio=0;
						    $imagen="";

							foreach ($respuesta as $row => $item) {
								$id=$item['id'];
								$nombre=$item['nombre'];
								$precio=$item['precio'];
								$imagen=$item['imagen'];
								$tipo1=$item['tipo'];
								$genero1=$item['genero'];

								}
							$precio=$precio*$cantidad;
							$DatosNuevos=array('Id'=>$id,
							'Nombre'=>$nombre, 
							'Precio'=>$precio,
						    'Imagen'=>$imagen,
						    'Cantidad'=>$cantidad,
							 'Color'=>$color,
							 'Tipo'=>$tipo1,
							 'Genero'=>$genero1
							 );
							 array_push($arreglo, $DatosNuevos);
							 	$_SESSION['carritoSlock']=$arreglo;
							 	

			}
				}
				return 1;
			}else{
				foreach ($respuesta as $row => $item) {
				$id=$item['id'];
				$nombre=$item['nombre'];
				$precio=$item['precio'];
				$imagen=$item['imagen'];
				$tipo1=$item['tipo'];
				$genero1=$item['genero'];
			}
			$precio=$precio*$cantidad;

			$arreglo[]=array('Id'=>$id,
							'Nombre'=>$nombre, 
							'Precio'=>$precio,
						    'Imagen'=>$imagen,
						    'Cantidad'=>$cantidad,
							 'Color'=>$color,
							 'Tipo'=>$tipo1,
							 'Genero'=>$genero1);
			$_SESSION['carritoSlock']=$arreglo;
			return 1;
		}
	}

}
}
public static function TotalPrecios(){
	$total=0;
	if(isset($_SESSION['carritoSlock'])){
		$arreglo=$_SESSION['carritoSlock'];
		for ($i=0; $i <count($arreglo) ; $i++) { 
			$total=$total+$arreglo[$i]["Precio"];
		}

	}
	return "₡".$total;
}
public static function FiltroProductoController($genero,$tipo){
	if(is_numeric($genero) && is_numeric($tipo)){
		$respuesta=ModelsCarrito::FiltroProductoModel($genero,$tipo,"productos");
	}else{
		return 0;
	}
		if($respuesta==0){
			echo 0;
		}else{

			foreach ($respuesta as $row => $item) {
				echo '	
				<div class="col-12 col-md-4 mt-4 mb-4">
					<span><img src="img/articulo/'.$item["imagen"].'" class="img-fluid descripcionArticulo" id="ajax">
					<h6 class="text-center nombre permanentMarket " style="color:#871A12;">'.$item["nombre"].'</h6>
					<input type="hidden" class="id" value="'.$item["id"].'"> 
					<div class="col-12 center-block">
					<input type="hidden" value="'.$item["genero"].'" class="generoProducto">
					 	<input type="hidden" value="'.$item["tipo"].'" class="tipoProducto">
						<label class="precio" >Precio: ₡'.$item["precio"].'</label><br>
						<span><img src="img/articulo/'.$item["imagen"].'" class="img-fluid" style="display:none">
						<h6 class="text-center nombre permanentMarket " style="color:#871A12; display:none;">'.$item["nombre"].'</h6>
						<input type="hidden" class="id" value="'.$item["id"].'"> 
						<label>Cant:</label><input type="number" name="cantidad" min="1" class="col-12 col-md-5 cantidad" value="1">
						<input type="hidden" value="'.$item["descripcion"].'" class="descripcion">
						</span>
					<span class="carritoproducto descripcionArticulo" id='.$item["id"].'><i class="fas fa-shopping-cart"></i></span></div>
					
				</div>';
			}
		}
}
}
 ?>
