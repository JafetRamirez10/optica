<!-- Modal -->
<div class="modal fade" id="examenesVista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background: #871A12">
        <h5 class="modal-title permanentMarket" id="exampleModalLabel"  style="color:white;" >Examen de la Vista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <img src="img/examenvista.jpg" style="width:100%">
          </div>  
          <div class="col-12">
            <br>
            <label  style="font-weight: bold;"><li>Examen de vista por computadora</li><label>
            <label style="font-weight: bold;"><li>Toma de presión intraocular</li><label>
            <label style="font-weight: bold;"><li>Fondo de ojo  sin dilatar pupila</li><label>
            <label style="font-weight: bold;"><li>Prueba de estudo lagrimal</li><label>
          </div>
      </div>
            <h2 class="text-center permanentMarket">Contactenos:</h2>
           <form method="post">
            <div class="form-group">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <input type="phone" name="telefono" class="form-control" placeholder="Teléfono" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
              <textarea name="mensaje" class="form-control" placeholder="Mensaje" required></textarea>
            </div>
            <div class="form-group">
              <button  type="submit"  name="ExamenVistaOptica" class="btn btn-md btn-primary">Solicitar Información</button>
            </div>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<?php 
  if (isset($_POST["ExamenVistaOptica"])) {
     $destinatario ="info@opticasalvarezcr.com";
    $asunto = "Cliente requiere atención";
    $cuerpo='<html>
    <head><title>Mensaje</title></head>
      <body>
        <h1 style="text-align:center">Solicito de exámen de vista</h1>
        <p style="text-align:center">Nombre: '.$_POST["nombre"].'</p>
        <p style="text-align:center">Teléfono: '.$_POST["telefono"].'</p>
        <p style="text-align:center">Correo electrónico: '.$_POST["email"].'</p>
        <p style="text-align:center">Mensaje: '.$_POST["mensaje"].'</p>


      </body>
    </html>';
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