<?php 
session_start();
if(!isset($_GET["id"])){
	echo "<script>location.href='index.php'</script>";
}else{
	if(isset($_SESSION["carritoSlock"])){
		$arreglo=$_SESSION['carritoSlock'];
for($i=0;$i<count($arreglo);$i++){
	if($arreglo[$i]['Color']!=$_GET["color"] || $arreglo[$i]['Genero']!=$_GET["Categoria"] ||  $arreglo[$i]['Tipo']!=$_GET["Tipo"] ){
		$datosNuevos[]=array(
					'Id'=>$arreglo[$i]["Id"],
					'Nombre'=>$arreglo[$i]['Nombre'],
					'Precio'=>$arreglo[$i]["Precio"],
					'Imagen'=>$arreglo[$i]['Imagen'],
					'Cantidad'=>$arreglo[$i]['Cantidad'],
					'Tipo'=>$arreglo[$i]['Tipo'],
					'Genero'=>$arreglo[$i]['Genero'],
					'Color'=>$arreglo[$i]['Color']
					);
	
	
	}
}
}
if (isset($datosNuevos)) {
	$_SESSION['carritoSlock']=$datosNuevos;
	echo "<script>location.href='productos.php'</script>";

}else{
		unset($_SESSION['carritoSlock']);
		echo '0';
		echo "<script>location.href='productos.php'</script>";
}
	}


 ?>