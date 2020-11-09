<?php

session_start();

if (!(isset($_SESSION['name_vnddor']))) 
{  echo '<script type="text/javascript">window.location="login.php";</script>'; } 

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
  case '7':    $_pasa=FALSE;   break;
  default:     $_pasa=FALSE;   break;
}

if ($_pasa == FALSE) {  echo '<script type="text/javascript">window.location="index.php";</script>';}

require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$listoUser = new Usuario($base);
$listoUserOK = $listoUser->listaUser();



if (isset($_GET['msj']))
{
  $_aux=$_GET['msj'];
  $_estado  = "Alerta";
  $_css_estado="warning";

  if  ($_aux== '0'){  $_mensaje = "completar todos los campos";             }elseif 
      ($_aux== '1'){  $_mensaje = "usuario ya existe";                      }elseif 
      ($_aux=='99'){  $_mensaje = "Usuario Creado"; $_estado  = "Excelente";  $_css_estado="success";}else{
                      $_mensaje = "Contactar con Administrador";  $_estado  = "Error";      $_css_estado="danger"; }
}


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





<a href="userup.php">
  <button class="w3-button w3-theme" onclick="agregar()"><i class="fa fa-address-card"></i> Agregar User </button>
</a>

<br>
<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busqueda por nombre .." title="Type in a name">


<table id="myTable">
  <tr class="header">
    <th style="width:14%;">Nro Comercial</th>
    <th style="width:14%;">Nombre</th>
    <th style="width:14%;">Apellido</th>
    <th style="width:14%;">User</th>
    <th style="width:14%;">Perfil</th>
    <th style="width:14%;">Creado</th>
    <th style="width:14%;">Modificar</th>
  </tr>

<?php
    for ($igg=0; $igg < count($listoUserOK); $igg++) 
    { 

      $_nrodoc_vnddor=$listoUserOK[$igg]['nrodoc_vnddor'];
      $_name_vnddor=$listoUserOK[$igg]['name_vnddor'];
      $_apellido_vnddor=$listoUserOK[$igg]['apellido_vnddor'];
      $_user_vnddor=$listoUserOK[$igg]['user_vnddor'];
      $_txt_pe=$listoUserOK[$igg]['txt_pe'];
      $_creado_vnddor=$listoUserOK[$igg]['creado_vnddor'];
      $_id_pe=$listoUserOK[$igg]['id_pe'];
      $_avatar=$listoUserOK[$igg]['avatar'];
      
      

      echo "<tr>";
      echo "<td>$_nrodoc_vnddor</td>";
      echo "<td>$_name_vnddor</td>";
      echo "<td>$_apellido_vnddor</td>";
      echo "<td>$_user_vnddor</td>";
      echo "<td>$_txt_pe</td>";
      echo "<td>$_creado_vnddor</td>";


      echo "<td>";
?>

      <form action="userup.php" method="POST">
        <input type="hidden" name="nrodoc_vnddor"   id="nrodoc_vnddor"    <?php echo "value='$_nrodoc_vnddor' ";    ?> >
        <input type="hidden" name="name_vnddor"     id="name_vnddor"      <?php echo "value='$_name_vnddor' ";      ?> >
        <input type="hidden" name="apellido_vnddor" id="apellido_vnddor"  <?php echo "value='$_apellido_vnddor' ";  ?> >
        <input type="hidden" name="user_vnddor"     id="user_vnddor"      <?php echo "value='$_user_vnddor' ";      ?> >
        <input type="hidden" name="txt_pe"          id="txt_pe"           <?php echo "value='$_txt_pe' ";           ?> >
        <input type="hidden" name="creado_vnddor"   id="creado_vnddor"    <?php echo "value='$_creado_vnddor' ";    ?> >
        <input type="hidden" name="id_pe"           id="id_pe"            <?php echo "value='$_id_pe' ";            ?> >
        <input type="hidden" name="avatar"          id="avatar"            <?php echo "value='$_avatar' ";          ?> >
        

        <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> </button> 
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