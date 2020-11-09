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
  case '5':    $_pasa=TRUE;    break;
  case '6':    $_pasa=FALSE;   break;
  case '7':    $_pasa=FALSE;   break;
  default:     $_pasa=FALSE;   break;
}

if ($_pasa == FALSE) {  echo '<script type="text/javascript">window.location="index.php";</script>';}

if (!(isset($_SESSION['name_vnddor']))) 
{  echo '<script type="text/javascript">window.location="login.php";</script>'; } 

//Post [id_po] => 15 [testo] => Aca va un texto aca otro salto de pagina HOURHOURAca va un texto aca otro salto de pagina HOURHOUR [activo] => 1 )

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

<?php  include_once 'section/menu.php'; ?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <div class="w3-row">
    <div class="w3-col m3">  
      <?php
      include_once 'section/caraverga.php';
      //include_once 'section/acordeon.php';
      //include_once 'section/intereses.php';
      //include_once 'section/boxalert.php';
      ?>
      
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

              <form action="funk/validapost.php" method="POST" enctype="multipart/form-data">
              <h3 class="w3-opacity">Nuevo Post</h3>

              <input type="hidden" name="id_po" id="id_po" >

              <input type="hidden" name="use" id="use" <?php echo "value='".$_SESSION['nrodoc_vnddor']."'"; ?> >

              <input type="text" name="tit" id="tit" class="w3-border w3-padding" placeholder="Titulo" required>

              <br><br>

              <textarea name="testo" id="testo" class="w3-border w3-padding" rows="4" cols="50" required>

              </textarea>
              <br>
              <span style='font-size: xx-small'> Hasta 9000 registros </span>
              <br><br>

              <!-- imagen 1 -->
              <div class="form-group">
              <input type="file" class="w3-button w3-theme" name="imag1" id="imag1" aria-describedby="fileHelpId">
              <br>
              <small id="fileHelpId" class="form-text text-muted">El formato de la imagen debe ser <b>PNG</b></small>
              </div>
              <br>
              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Postear </button> 
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
</div>
<br>

<!-- Footer >
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer-->

<!--footer class="w3-container w3-theme-d5">
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