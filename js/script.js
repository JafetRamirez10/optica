ejecutarUnaVez=false;
// Efecto de menu prinicipal
$(window).load(function(){

var la_altura = $(".hero1").offset().top;
$(window).on("scroll", function(){
		if ( $(window).scrollTop() > la_altura ){
			$("nav.navbar").attr("style","background:white!important");
			$("nav.navbar a").attr("style","color:#871A12!important");

			$("nav.navbar a").hover(function(){
				$(this).attr("style","color:white!important");
				
			},function(){
				$(this).attr("style","color:#871A12!important");
			});

			$("nav.navbar a.dropdown-item").hover(function(){
				$(this).attr("style","color:white!important");
			}, function(){
				$(this).attr("style","color:#871A12!important");
			});


		}else{
			$("nav.navbar").attr("style","background:transparent!important");
			$("nav.navbar a").attr("style","color:white!important");
			$("nav.navbar a:hover").css("color","#871A12");
			$("nav.navbar a.dropdown-item").attr("style","color:#871A12!important");
			$("nav.navbar a").hover(function(){
				$(this).attr("style","color:white!important");


			},function(){
				
				$(this).attr("style","color:white!important");
				
			});

			$("nav.navbar a.dropdown-item").hover(function(){
				$(this).attr("style","color:white!important");
			}, function(){
				$(this).attr("style","color:#871A12!important");
			})

		}
});
});
// Fin de efecto principal


$(document).ready(function(){

		// Modal de carrito de compra
		$(".descripcionArticulo").click(function(){
			$(".añadirCarrito").attr("style","");
			$(".cerrar").html("Cerrar");
			padre=$(this).parent();
			nombre = $(padre).find(".nombre").html();
			imagen = $(padre).find("img").attr("src");
			precio =$(padre).find(".precio").html();
			idGenero=$(padre).find(".generoProducto").val();
			idTipo=$(padre).find(".tipoProducto").val();
			cantidad =$(padre).find(".cantidad").val();
			descripcion =$(padre).find(".descripcion" ).val();
			id=$(padre).find(".id" ).val();
			$(".descripcion .nombre").html(nombre);
			$(".descripcion .descripcion1").html(descripcion);
			$(".descripcion .precio").html(precio);
			$(".descripcion .cantidad").val(cantidad);
			$(".descripcion  .IdProducto").val(id);
			$(".imagenDescripcion").attr("src",imagen);
			$(".GeneroE").val(idGenero);
			$(".TipoE").val(idTipo);
			if(idGenero=="2" && idTipo=="2"){
				$(".descripcion .coloresLentes").attr("style","");
			}else{
				$(".descripcion .coloresLentes").attr("style","display:none");
			}

			$("#descripcionProducto").modal("show");
			// Fin de carrito de compra

	});
		// $(".modal-footer .cerrar").click(function(){

		// });
		
		//AJAX carrito de compra
			$(".añadirCarrito").click(function(){
				if(ejecutarUnaVez==false){
				producto =$(".descripcion  .IdProducto").val();
				cantidad=$(".descripcion .cantidad").val();
				valor=$(".descripcionArticulo").attr("id");
			Genero=$(".GeneroE").val();
			Tipo=$(".TipoE").val();
			Color=$("#ColorLentes").val();
			if(Color==null){
				Color="vacia";
			}


				console.log(cantidad);
				console.log(Tipo);
				console.log(Color);
				console.log(Genero);
			
  var datos={
  	'idProducto':producto,
  	'Cantidad':cantidad,
  	'Genero':Genero,
  	'Tipo':Tipo,
  	'Color':Color
  }
   $.ajax({
    url:"views/ajaxCarrito.php",
    method:"POST",
    data:datos,

    success:function(respuesta){
     
      if(respuesta==0){
      	console.log("Ha ocurrido un error");
      }
  else{
  
  	$(".aviso").fadeIn();
  	$(".aviso").fadeOut(3000);
     console.log("Se agrego correctamente");
     $(".añadirCarrito").attr("style","display:none");
     $(".cerrar").attr("onclick","location.reload();");
     $(".cerrar").html("Continuar comprando");
         }
  }
 });
			} ejecutarUnaVez=true;})
			//FIN DE AJAX carrito de compra

			//Añadir Select  GENERO Y TIPO
			$(".seleccionarGenero").change(function(){
				filtroCategoria();
			});
			$(".SeleccionarTipo").change(function(){
				filtroCategoria();
			});

			// Fin de Select

			//Activar pago de tarjeta
			$(".valorCorrecto").click(function(){
				correcto = $(this).val();
				if(correcto=="si"){
					$(".panel-default").attr("style","");
				}else{
					$(".panel-default").attr("style","display:none");
				}
			})
			//Fin de pago tarjeta
		
});
	
	function filtroCategoria(){
			
			Genero=$(".seleccionarGenero").val();
			Tipo=$(".SeleccionarTipo").val();
			if(Genero=="todo"){
				Genero=0;				
			}
			if(Tipo=="todo"){
				Tipo=0;
			}
			if(Genero!=2){
				$(".SeleccionarTipo").attr("style","display:none");
			}else{
				//$(".SeleccionarTipo").attr("style","");
			}
					var datos={
		  	'genero':Genero,
		  	'tipo':Tipo
		 		 }
		   $.ajax({
		    	url:"views/ajaxCarrito.php",
		    	method:"POST",
		    	data:datos,

		    	success:function(respuesta){
		     
		     	if(respuesta==0){
		     		//$(".mostrarTodosP").attr("style","");
		     		$(".CategoriasProductos").html("<center>No existe Producto en esta categoria</center><br><a href='index.php'>Ver todos los productos</a> ");
		      		console.log("Ha ocurrido un error");
		      		console.log(respuesta);
		      }
		 		 else{
		  			$(".mostrarTodosP").remove();
					$(".CategoriasProductos").html(" ");
		  			$(".CategoriasProductos").html(respuesta+'<script  src="js/script.js"></script>');
		  			console.log(respuesta);
		         }
		  	}

		 });
		

			}
		