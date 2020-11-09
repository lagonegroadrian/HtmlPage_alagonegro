<?php
$_img=$_SESSION['avatar'];


if(empty($_img)){$_img='quien';}
?>

      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <p class="w3-center">
<?php           
           echo "<img src='w3images/avatar".$_img.".png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'>";
?>
             </p>
         <h4 class="w3-center">
<?php 
          $_roll=$_SESSION['txt_perfil'];          
          echo ucwords($_SESSION["name_vnddor"]).", ".ucwords($_SESSION["apellido_vnddor"]);
?>
         </h4>
         <hr>
         <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_roll; ?> </p>
         <!--p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Buenos Aires, San Miguel </p-->
         <p><i class="fa fa-list-ol fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['nrodoc_vnddor']; ?> </p>
        </div>
      </div>
      <br>