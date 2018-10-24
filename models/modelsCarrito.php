<?php 
require "conexion.php";
 class ModelsCarrito{

//Consulta de todo las base de datos
 public static function MostrarTodosProductos(){
 $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
 if($stmt->execute()){
 	return $stmt->fetchAll();
  }else{
  	return 0;
  }
 }
 public static function AnadirProductoModels($idproducto,$tabla){
 	$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
 	$stmt->bindParam(":id",$idproducto);
 	if($stmt->execute()){
 		return $stmt->fetchAll();
 	}else{
 		return 0;
 	}
 }
 public static function FiltroProductoModel($genero,$tipo,$tabla){
 	if($genero==0 && $tipo==0){
 		 $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
 	}else if ($genero==0 && $tipo!=0){
 		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo=:tipo");
 		$stmt->bindParam(":tipo",$tipo);
 	}else if($tipo==0  && $genero!=0){
 		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE genero=:genero");
 		$stmt->bindParam(":genero",$genero);
 	}else if($tipo!=0 && $genero!=0){
 		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE genero=:genero AND tipo=:tipo");
 		$stmt->bindParam(":genero",$genero);
 		$stmt->bindParam(":tipo",$tipo);
 	}
 	if($stmt->execute()){
 		return $stmt->fetchAll();
 	}else{
 		return 0;
 	}

 }
}