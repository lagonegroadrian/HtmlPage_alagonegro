<?php
  require 'autoload.php';

  $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
  $post = new Post($base);
  $postOK = $post->getPost(1);

  for ($aux=0; $aux < count($postOK); $aux++)
  { 
     $_id=$postOK[$aux]['id_po'];
     $_user=$postOK[$aux]['user_po'];
     $_titu=$postOK[$aux]['titu_po'];
     $_testo=nl2br($postOK[$aux]['testo_po']);
     $_img1=$postOK[$aux]['img1_po'];
     $_alta=$postOK[$aux]['alta_po'];
     $_diasdif=$postOK[$aux]['diasdif'];
     $_nom=ucwords($postOK[$aux]['name_vnddor']);
     $_ape=ucwords($postOK[$aux]['apellido_vnddor']);
     $_avatar=$postOK[$aux]['avatar'];
?>

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

        
<?php
      echo "<img src='w3images/avatar".$_avatar.".png' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>";
?>
      <span class="w3-right w3-opacity"><?php echo "$_diasdif Hs"; ?></span>
      <h6> <?php echo "$_nom , $_ape"; ?> </h6>
      <hr class="w3-clear">
<?php
            echo "<h4> $_titu </h4>";
            echo "<p> $_testo  </p>";
?>
      
      <img <?php echo "src='post/$_id/$_id.png' alt='$_titu' "; ?> style="width:100%" class="w3-margin-bottom">
      </div>

<?php
  }
?>





      <!--div class="w3-container w3-card w3-white w3-round w3-margin"><br>

        <img src="w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">

        <span class="w3-right w3-opacity">1 min</span>

        <h4>John Doe</h4><br>

        <hr class="w3-clear">

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

          <div class="w3-row-padding" style="margin:0 -16px">

            <div class="w3-half">

              <img src="w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">

            </div>

            <div class="w3-half">

              <img src="w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">

          </div>

          <div class="w3-half">

              <img src="w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">

            </div>

            <div class="w3-half">

              <img src="w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">

            </div>

        </div>



      </div>







      

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

        <img src="w3images/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">

        <span class="w3-right w3-opacity">16 min</span>

        <h4>Jane Doe</h4><br>

        <hr class="w3-clear">

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>



      </div-->