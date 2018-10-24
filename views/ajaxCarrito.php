<?php 
require "../models/modelsCarrito.php";
require "../controller/controllerCarrito.php";
class Ajax{
	public $producto;
	public $cantidad;
	public $genero;
	public $tipo;
	public $color;
public function AnadirProductoAjax(){
	$producto=$this->producto;
	$cantidad=$this->cantidad;
	$tipo=$this->tipo;
	$genero=$this->genero;
	$color=$this->color;
	$respuesta=ControllerCarrito::AnadirProductoController($producto,$cantidad,$genero,$tipo,$color);
	echo $respuesta;
}

public function FiltroProducto(){
	$genero=$this->genero;
	$tipo=$this->tipo;
	$respuesta=ControllerCarrito::FiltroProductoController($genero,$tipo);
}


}


if(isset($_POST["idProducto"])){
	
	$nuevoProducto = new Ajax();
	$nuevoProducto->producto=$_POST["idProducto"];
	$nuevoProducto->cantidad=$_POST["Cantidad"];
	$nuevoProducto->genero=$_POST["Genero"];
	$nuevoProducto->tipo=$_POST["Tipo"];
	$nuevoProducto->color=$_POST["Color"];
	$nuevoProducto->AnadirProductoAjax();
}
if(isset($_POST["genero"])){
	$FiltroProducto= new Ajax();
	$FiltroProducto->genero=$_POST["genero"];
	$FiltroProducto->tipo=$_POST["tipo"];
	$FiltroProducto->FiltroProducto();
}