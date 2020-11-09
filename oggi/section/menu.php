<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>
  
  <!--a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a-->


<?php
$_perfil=$_SESSION['tipouser_vnddor'];

if (($_perfil=='1') || ($_perfil=='5'))// administrador y marketing
{
?>
  <a href="abm_post.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Agregar Post"><i class="fa fa-commenting"></i></a>
<?php
}
?>


<?php

if (($_perfil=='1'))
{
?>
    <a href="abm_user.php" class="w3-bar-item w3-button w3-hide-small    w3-padding-large w3-hover-white" title="Agregar Usuarios"> <i class="fa fa-user-plus"></i></a>
<?php
}
?>





  <a href="documentos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Documentos">
    <i class="fa fa-file-o"></i>
  </a>




<?php

if (($_perfil=='1') || ($_perfil=='7'))// administrador y capacitadores
{
?>
  <div class="w3-dropdown-hover w3-hide-small">
    
    <button class="w3-button w3-padding-large" title="Trivia"><i class="fa fa-steam"></i><span class="w3-badge w3-right w3-small w3-green">.</span></button>

    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="abm_trivia.php" class="w3-bar-item w3-button">Crear Trivia</a>
      <a href="abm_pregunta.php" class="w3-bar-item w3-button">Crear pregunta</a>
      <a href="abm_opcion.php" class="w3-bar-item w3-button">Crear Opciones</a>
    </div>   

  </div>








  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Reporte"><i class="fa fa-file"></i><span class="w3-badge w3-right w3-small w3-green">.</span></button>
    
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">    
      <a href="repo_trivia.php" class="w3-bar-item w3-button">Reporte x Trivia</a>
    </div>

    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">    
      <a href="../qsr/pe.php" class="w3-bar-item w3-button" target="_blank" >Central Quejas</a>
    </div>

  </div>

<?php
}
?>

















<?php

//01-administrador
//02-comercial
//03-Director
//04-Gerente
//08-CallCenter
//09-Supervisor
//10-Administrativo Externo

if (($_perfil=='1') || ($_perfil=='2') || ($_perfil=='3') || ($_perfil=='4') || ($_perfil=='8') || ($_perfil=='9') || ($_perfil=='10'))
{
?>

  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Reporte"><i class="fa fa-file"></i><span class="w3-badge w3-right w3-small w3-green">.</span></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">    
      <a href="repo_estado_fichas.php" class="w3-bar-item w3-button">Estado de fichas x Mes</a>
    </div>   

  </div>

<?php
}
?>














<a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">Salir
  <i class="fa fa-sign-out"></i>
</a>

</div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
<a href="repo_estado_fichas.php" class="w3-bar-item w3-button w3-padding-large">Repo</a>
<a href="repo_estado_fichas.php" class="w3-bar-item w3-button w3-padding-large">Reporte</a>
<a href="documentos.php"  class="w3-bar-item w3-button w3-padding-large">Documentos</a>
<a href="logout.php"      class="w3-bar-item w3-button w3-padding-large">Salir</a>

</div>