<?php
session_start();

?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="es">

  <?php
    include_once 'section/head_html.php';
  ?>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

  <body class="ps-loading">
    <?php  include_once 'section/cabecera.php'; ?>
    <?php  include_once 'section/slice.php'; ?>

    <main class="ps-main">
      
      <!--logeados inicio-->
      <?php  //include_once 'section/dash_secciones.php'; ?>
      
      <?php  


        if(isset($_GET['id']))
        {
          include_once 'section/dash_comentario.php';
        }
        else
        {
          include_once 'section/dash_lista_pedido.php'; 
        }

      ?>

      <?php  include_once 'section/footer.php'; ?>
      <!--logeados fin-->


      <!--Home inicio-->
      <?php  //include_once 'section/baner.php'; ?>    
      <?php  //include_once 'section/promocion.php'; ?>      
      <?php  //include_once 'section/baner2.php'; ?>
      <?php  //include_once 'section/staff.php'; ?>      
      <?php  //include_once 'section/servicios.php'; ?>
      <?php  //include_once 'section/contacto2.php'; ?>      
      <?php  //include_once 'section/login.php'; ?>
      <!--Home fin-->

      <?php  //include_once 'section/promocion2.php'; ?>
      <?php  //include_once 'section/descuentos.php'; ?>
      <?php  //include_once 'section/topventas.php'; ?>
      <?php  //include_once 'section/imagenes_dos.php'; ?>
      <?php  //include_once 'section/nosotros.php'; ?>
      <?php  //include_once 'section/carrousel.php'; ?>
      <?php  //include_once 'section/staff2.php'; ?>
      <?php  //include_once 'section/comparador.php'; ?>
      <?php  //include_once 'section/blog2.php'; ?>
      <?php  //include_once 'section/suscribirse.php'; ?>
      <?php  //include_once 'section/producto_pagar.php'; ?>
      <?php  //include_once 'section/blog.php'; ?>
      <?php  //include_once 'section/producto_lista2.php'; ?>      
      <?php  //include_once 'section/recomendacion.php'; ?>
      <?php  //include_once 'section/producto_lista.php'; ?>
      <?php  //include_once 'section/recomendacion.php'; ?>
      <?php  //include_once 'section/destacado.php'; ?>   
      <?php  //include_once 'section/blog3.php'; ?>

    </main>

    <!-- JS Library-->
    <?php  include_once 'section/plugins_js.php'; ?>
    <script type="text/javascript" src="js/main.js"></script>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


  </body>
</html>