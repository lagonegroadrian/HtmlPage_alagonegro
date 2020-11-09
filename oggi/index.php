<?php

session_start();

if (!(isset($_SESSION["name_vnddor"]))) 
{  echo '<script type="text/javascript">window.location="login.php";</script>'; } 



?>

<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="funk/script.js"></script>
<title>Oggi homme</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--link rel="stylesheet" type="text/css" href="dist/notie.css"-->
<!--script src="dist/notie.js"></script-->
</head>


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
    
    <!-- Columna del diome - inicio -->
    <div class="w3-col m7">

      
      <?php
        include_once 'section/liquidacion.php';      
        include_once 'section/novedad.php';
      ?>    


    </div>
    <!-- Columna del diome - fin -->
    
    <!-- Columna de la Derecha - inicio -->
    <div class="w3-col m2">
      

      <?php      
      //include_once 'section/proximo.php';
      //include_once 'section/request.php';
      include_once 'section/ads.php';
      include_once 'section/bug.php';
      ?>
    
    </div>
    <!-- Columna de la Derecha - fin -->
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h6>Fin de la página <!--a href="https://www.linkedin.com/in/nestor-adrian-lagonegro-21b89a22" target="_blank">Desarrollador</a-->
  </h6>
</footer>

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