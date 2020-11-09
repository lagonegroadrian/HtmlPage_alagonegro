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
  case '5':    $_pasa=FALSE;    break;
  case '6':    $_pasa=FALSE;   break;
  case '7':    $_pasa=TRUE;   break;
  default:     $_pasa=FALSE;   break;
}

if ($_pasa == FALSE) {  echo '<script type="text/javascript">window.location="index.php";</script>';}

if (!isset($_SESSION['name_vnddor']))
{  echo '<script type="text/javascript">window.location="login.php";</script>'; } 


$_titulo=$_POST['_texto_tr'];
$_idtri=$_POST['_id_tr'];
$_vig_ini_tr=$_POST['_vig_ini_tr'];
$_vig_fin_tr=$_POST['_vig_fin_tr'];

require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$listoRespuesta = new Respuesta($base);
$listoRespuestaOK = $listoRespuesta->listarRespuesta($_idtri);

//echo "<pre>";
//print_r($listoRespuestaOK);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="es">
<title>Oggi + Post</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">


<?php
  include_once 'section/menu.php';
  header('Content-type:application/xls');
  header('Content-Disposition: attachment; filename=Trivia (Respuestas).xls');
?>



<!-- Page Container -->
<div class="w12-container w3-content" style="max-width:1400px;margin-top:80px">    
<div class="container">

<h1>  <?php  echo $_titulo;   ?> </h1>

<br>
<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busqueda por Pregunta .." title="Type in a name">


<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Usuario</th>
    <th style="width:20%;">Respondió</th>
    <th style="width:20%;">Pregunta</th>
    <th style="width:20%;">Respondio</th>
    <th style="width:20%;">Fue</th>
  </tr>

<?php
for ($ipo=0; $ipo < count($listoRespuestaOK); $ipo++) 
    { 
      $_usuario=$listoRespuestaOK[$ipo]['usuario'];
      $_fecha_respuesta=$listoRespuestaOK[$ipo]['fecha_respuesta'];      
      $_descripcion_pregunta=$listoRespuestaOK[$ipo]['descripcion_pregunta'];
      $_descripcion_respuesta=$listoRespuestaOK[$ipo]['descripcion_respuesta'];
      $_correcto=$listoRespuestaOK[$ipo]['correcto'];

      echo "<tr>";
      echo "<td>$_usuario</td>";
      echo "<td>$_fecha_respuesta</td>";
      echo "<td>$_descripcion_pregunta</td>";
      echo "<td>$_descripcion_respuesta</td>";
      echo "<td>$_correcto</td>";
      echo "</tr>";
    }
?>
  

</table>









</div>
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

 
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





function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</script>

</body>
</html> 