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

require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$listoTrivia = new Trivia($base);
$listoTriviaOK = $listoTrivia->getallTrivias();

$_vig_fin_tr1=$listoTriviaOK[0]['perfil_tr'];
$_vig_fin_tr2=$listoTriviaOK[1]['perfil_tr'];



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
?>


<!-- Page Container -->
<div class="w12-container w3-content" style="max-width:1400px;margin-top:80px">    
<div class="container">


<br>
<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busqueda por titulo .." title="Type in a name">

<!--a href="pdf.php">Generar XLS</a-->
          
<table id="myTable">
  <tr class="header">
    <th style="width:5%;">Nro</th>
    <th style="width:40%;">Titulo de trivia</th>
    <th style="width:10%;">Fecha Inicio</th>
    <th style="width:10%;">Fecha Fin</th>
    <th style="width:15%;">Para Perfiles</th>
    <th style="width:10%;">Ver Respuestas</th>
    <th style="width:10%;">Reporte general</th>
  </tr>

<?php

for ($ipo=0; $ipo < count($listoTriviaOK); $ipo++) 
    { 
      $_id_tr=$listoTriviaOK[$ipo]['id_tr'];
      $_texto_tr=$listoTriviaOK[$ipo]['texto_tr'];      
      $_vig_ini_tr=$listoTriviaOK[$ipo]['vig_ini_tr'];
      $_vig_fin_tr=$listoTriviaOK[$ipo]['vig_fin_tr'];
      $_perfil_tr=$listoTriviaOK[$ipo]['perfil_tr'];


        $_perfel="";
        $_perfil="";

        $porciones = explode(',', $_perfil_tr);
      
        for ($sap=0; $sap < count($porciones); $sap++)
        { 
          
          switch ($porciones[$sap])
          {
            case '1':      $_perfel="Administrador ,"; break;
            case '2':      $_perfel="Comercial ,"; break;
            case '3':      $_perfel="Director ,"; break;
            case '4':      $_perfel="Gerente ,"; break;
            case '5':      $_perfel="Marketing ,"; break;
            case '7':      $_perfel="Capacitador ,"; break;
            default:       $_perfel="Usuario dado de Baja"; break;
          }

          $_perfil.= $_perfel;

        }

      
      echo "<tr>";
      echo "<td>$_id_tr</td>";
      echo "<td>$_texto_tr</td>";
      echo "<td>$_vig_ini_tr</td>";
      echo "<td>$_vig_fin_tr</td>";
      echo "<td>$_perfil</td>";

      echo "<td>";
?>


      <form action="repo_respuesta.php" method="POST">
        <input type="hidden" name="_id_tr"             id="_id_tr"            <?php echo "value='$_id_tr' ";           ?> >
        <input type="hidden" name="_texto_tr"          id="_texto_tr"         <?php echo "value='$_texto_tr' ";        ?> >
        <input type="hidden" name="_vig_ini_tr"        id="_vig_ini_tr"       <?php echo "value='$_vig_ini_tr' ";      ?> >
        <input type="hidden" name="_vig_fin_tr"        id="_vig_fin_tr"       <?php echo "value='$_vig_fin_tr' ";      ?> >
        <button type="submit" class="w3-button w3-theme"><i class="fa fa-eye"></i> </button> 
      </form>

    </td>










    <td>


      <form action="reporte_respondidos.php" method="POST">
        <input type="hidden" name="_id_tr"             id="_id_tr"            <?php echo "value='$_id_tr' ";           ?> >
        <input type="hidden" name="_texto_tr"          id="_texto_tr"         <?php echo "value='$_texto_tr' ";        ?> >
        <input type="hidden" name="_vig_ini_tr"        id="_vig_ini_tr"       <?php echo "value='$_vig_ini_tr' ";      ?> >
        <input type="hidden" name="_vig_fin_tr"        id="_vig_fin_tr"       <?php echo "value='$_vig_fin_tr' ";      ?> >
        <button type="submit" class="w3-button w3-theme"><i class="fa fa-download"></i> </button> 
      </form>

<?php      

      echo "</td>";

      echo "</tr>";
    }
?>
  

</table>









</div>
<!-- End Page Container -->
</div>
<br>

<!-- Footer >
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
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





function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
