<?php

session_start();

if(!isset($_SESSION['id_pe']))
{    
  echo '<script type="text/javascript">window.location="login.php";</script>';
}

$_id_perfil=$_SESSION['id_pe'];
switch ($_id_perfil) 
{
  case '1':    $_pasa=TRUE;    break;
  case '2':    $_pasa=FALSE;   break;
  case '3':    $_pasa=FALSE;   break;
  case '4':    $_pasa=FALSE;   break;
  case '5':    $_pasa=FALSE;   break;
  case '6':    $_pasa=FALSE;   break;
  case '7':    $_pasa=TRUE;    break;
  default:     $_pasa=FALSE;   break;
}

if ($_pasa == FALSE) {  echo '<script type="text/javascript">window.location="index.php";</script>';}

if (!(isset($_SESSION['name_vnddor']))){echo '<script type="text/javascript">window.location="login.php";</script>';}

//if ($_SESSION['id_pe'] !== 1 ){echo '<script type="text/javascript">window.location="login.php";</script>';}

  require 'autoload.php';

  $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
  $pregunta = new Pregunta($base);
  
  $preguntaOK = $pregunta->getPreguntasXtrvia();


?>

<!DOCTYPE html>
<html lang="es">
<title>Oggi + post</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">


<?php
  include_once 'section/menu.php';
?>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">  
      <?php
      // Profile
      include_once 'section/caraverga.php';
      //include_once 'section/acordeon.php';
      //include_once 'section/intereses.php';
      include_once 'section/boxalert.php';
      ?>
      
    </div>
    
<!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

              <form action="funk/validar_trivia.php?q=opc" method="POST" enctype="multipart/form-data">
              <h3 class="w3-opacity">Alta de Opciones</h3>
              
              <!--p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p-->

              
              <select class="w3-border w3-padding" id='id_trivia' name="id_trivia">
<?php
              for ($aux=0; $aux < count($preguntaOK); $aux++) 
              { 

              //id_pr, id_tr, concat(texto_tr ,' - ', descrip_pr) as texto

              $_id_pr=$preguntaOK[$aux]['id_pr'];
              $_texto_tr=$preguntaOK[$aux]['texto'];
              echo "<option value='".$_id_pr."'>".$_texto_tr."</option>";
              }
?>
              </select> <br> <br>

              <input type="text" name="opcion" id="opcion" placeholder="ingresar Opcion" class="w3-border w3-padding" required><br> <br>

              <select class="w3-border w3-padding" id='respuesta' name="respuesta">
                <option value="1">Respuesta correcta</option>
                <option value="1" selected="">Respuesta incorrecta</option>
              </select>
              <br> <br>

              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Crear </button> 



            </form>

            </div>
          </div>
        </div>
      </div>
    <!-- End Middle Column -->
    </div>
    

   
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer >
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer-->
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 