<?php

class Conexion{

	public static function conectar(){

		$link =  new PDO("mysql:host=localhost;dbname=carritocompras","root","");;
		 $link->exec("set names utf8");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		return $link;

	}

}

