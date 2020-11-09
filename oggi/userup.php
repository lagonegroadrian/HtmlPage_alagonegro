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
  case '7':    $_pasa=FALSE;   break;
  default:     $_pasa=FALSE;   break;
}

if ($_pasa == FALSE) {  echo '<script type="text/javascript">window.location="index.php";</script>';}


$_alta="Crear";
if(isset($_POST['nrodoc_vnddor']))
{
    $_nrodoc_vnddor=$_POST['nrodoc_vnddor'];
    $_name_vnddor=$_POST['name_vnddor'];
    $_apellido_vnddor=$_POST['apellido_vnddor'];
    $_user_vnddor=$_POST['user_vnddor'];
    $_txt_pe=$_POST['txt_pe'];
    $_creado_vnddor=$_POST['creado_vnddor'];
    $_id_pe=$_POST['id_pe'];
    $_avatar=$_POST['avatar'];
    $_alta="Modificar";


    $_av1="";
    $_av2="";
    $_av3="";
    $_av4="";
    $_av5="";
    $_av6="";
    
    switch ($_avatar) {
      case '1':        $_av1="checked ";        break;
      case '2':        $_av2="checked ";        break;
      case '3':        $_av3="checked ";        break;
      case '4':        $_av4="checked ";        break;
      case '5':        $_av5="checked ";        break;
      case '6':        $_av6="checked ";        break;
      default:         $_av1="checked ";        break;
    }
    
}




//if (!(isset($_SESSION['name_vnddor']))) 
//{  echo '<script type="text/javascript">window.location="login.php";</script>'; } 

require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$perfil = new Perfil($base);
$perfilOK = $perfil->getPerfils();



if (isset($_GET['msj']))
{
  $_aux=$_GET['msj'];
  $_estado  = "Alerta";
  $_css_estado="warning";

  if 
  ($_aux== '0'){  $_mensaje = "completar todos los campos";             }elseif 
  ($_aux== '1'){  $_mensaje = "usuario ya existe";                      }elseif 
  ($_aux=='99'){  $_mensaje = "Usuario Alterado"; $_estado  = "Excelente";  $_css_estado="success";}else{
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

<?php   if(!empty($_mensaje)) { ?>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
<?php   }   ?>

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

#obligado{background-color: red;}

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



<?php

              if(!empty($_mensaje))
              {

                echo "<div class='alert alert-$_css_estado alert-dismissible fade in'>";

                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "<strong>$_estado ! </strong> $_mensaje";
                echo "</div>";

              }
?>

              <form action="funk/validar.php" method="POST">
              <h3 class="w3-opacity">Alta de Usuario</h3>

              
              <input type="hidden" name="creado_vnddor"   id="creado_vnddor"    <?php echo "value='$_creado_vnddor' ";    ?> >

              <input type="number" name="nrodoc_vnddor" id="nrodoc_vnddor" placeholder="Nro comercial" class="w3-border w3-padding" 
<?php
              if (isset($_nrodoc_vnddor)){echo "value='$_nrodoc_vnddor' readonly ";}
?>
              required>
              <br> <br>
              <input type="text" name="name_vnddor" id="name_vnddor" placeholder="Nombre" class="w3-border w3-padding" 
<?php
              if (isset($_name_vnddor)){echo "value='$_name_vnddor'";}
?>
              required>
              <br> <br>
              <input type="text" name="apellido_vnddor" id="apellido_vnddor" placeholder="Apellido" class="w3-border w3-padding" 
<?php
              if (isset($_apellido_vnddor)){echo "value='$_apellido_vnddor'";}
?>
              required>
              <br> <br>
              <input type="text" name="user_vnddor" id="user_vnddor" placeholder="Usuario" class="w3-border w3-padding" 
<?php
              if (isset($_user_vnddor)){echo "value='$_user_vnddor'";}
?>
              required>
              <br> <br>
              
              <input type="text" name="senha_vnddor" id="senha_vnddor" placeholder="Pass" class="w3-border w3-padding" required>
              <br> <br>
              
              <label for="tipouser_vnddor"><b>Fecha de nacimiento</b></label>
              <br>
              <div class="w3-col m4">
              <input type="date" name="cumple_vmddor" id="cumple_vmddor" placeholder="Fecha de nacimiento" class="w3-border w3-padding" >
              </div>

              <br>
              <br>
              <br>
              <label for="tipouser_vnddor"><b>Perfil</b></label>
              <br>

<?php
              for ($aux=0; $aux < count($perfilOK); $aux++)
              {
                $_chec=" ";
                if ($perfilOK[$aux]['id_pe']==$_id_pe){$_chec=" checked ";}
                echo "<input type='radio' name='tipouser_vnddor' value='".$perfilOK[$aux]['id_pe']."' $_chec > ".ucfirst($perfilOK[$aux]['txt_pe']) ."<br>";
              }
?>
              <br>


              <label for="tipouser_vnddor"><b>Adicionales</b></label>
              <br>
              <div class="w3-col m4">
              <label><input type="checkbox" id="cbox1" value="first_checkbox"> Central de quejas y sujerencias</label><br>
              </div>
               <br><br>


              <label for="avatar_vnddor"><b>Avatar</b></label>
              <br>

              <div class="w3-col m4">
              <input type="radio" name="avatar_vnddor" value="1" <?php echo $_av1; ?>> <img src="w3images/avatar1.png" alt="avatar1" width="42" height="42">
              </div>

              <div class="w3-col m4">
              <input type="radio" name="avatar_vnddor" value="3" <?php echo $_av3; ?>> <img src="w3images/avatar3.png" alt="avatar3" width="42" height="42">
              </div>

              <div class="w3-col m4">
              <input type="radio" name="avatar_vnddor" value="5" <?php echo $_av5; ?>> <img src="w3images/avatar5.png" alt="avatar5" width="42" height="42">
              </div>

              <br>
              <br>
              
              <div class="w3-col m4">
              <input type="radio" name="avatar_vnddor" value="2" <?php echo $_av2; ?>> <img src="w3images/avatar2.png" alt="avatar2" width="42" height="42">
              </div>

              <div class="w3-col m4">
              <input type="radio" name="avatar_vnddor" value="4" <?php echo $_av4; ?>> <img src="w3images/avatar4.png" alt="avatar4" width="42" height="42">
              </div>

              <div class="w3-col m4">
              <input type="radio" name="avatar_vnddor" value="6" <?php echo $_av6; ?>> <img src="w3images/avatar6.png" alt="avatar6" width="42" height="42"> 
              </div>

              <br>
              <br>
              <br>

              <!--input type="text" name="nombre" placeholder="Nombre" class="w3-border w3-padding" required>
              <br> <br>
              <input type="text" name="apellido" placeholder="Apellido" class="w3-border w3-padding" required>
              <br> <br>
              <input type="text" name="dni" placeholder="DNI" class="w3-border w3-padding" required>
              <br> <br>
              <input type="text" name="user" placeholder="Usuario" class="w3-border w3-padding" required>
              <br> <br>
              <input type="password" name="pass" placeholder="Password" class="w3-border w3-padding" required>
              <br> <br>
              <label for="perfil"><b>Perfil</b></label>
              <br>

              <input type="radio" name="perfil" value="com"> Comercial<br>
              <input type="radio" name="perfil" value="ger"> Gerente<br>
              <input type="radio" name="perfil" value="cap"> Capacitador<br>
              <input type="radio" name="perfil" value="adm"> Adminitrador<br>
              <br-->

            <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> 
<?php
            echo $_alta;
?>
            </button> 
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
</script>

</body>
</html> 