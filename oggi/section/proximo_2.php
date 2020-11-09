<?php

  //session_start();
  
  echo "<br>_usuario---->* ".$_SESSION['nrodoc_vnddor']." *<br>";
  
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
  
  $_usuario=$_SESSION['nrodoc_vnddor'];
  
  echo "uno<br>";
  require 'autoload.php';
  echo "dos<br>";
  
  $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
  echo "3<br>";
  $trivia = new Trivia($base);
  echo "4<br>";
  $triviaOK = $trivia->getTriviasDisponible($_usuario);
  echo "5<br>";

  echo "<br>string";

  echo "Acaaaaa <pre>";
  print_r($triviaOK);
  echo "</pre>";

if(!(is_bool($triviaOK)))
{

  $_per_qu=$triviaOK[0]['perfil_tr'];
  echo "<br>_per_qu--->$_per_qu";

  $_per_se=$_SESSION['id_pe'];
  echo "<br>_per_se--->$_per_se";

  $_posi = strpos($_per_qu,$_per_se);
  echo "<br>_posi--->$_posi";
  
  //&& (!empty($_posi)

  if ($triviaOK)
  {


  ?>
    <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">

          <p>Trivia pendiente</p>
          <img src="w3images/alert.jpg" alt="Forest" style="width:100%;">
          <!--img src="w3images/forest.jpg" alt="Forest" style="width:100%;"-->

          <p>
            <strong>

            <?php 
            echo $triviaOK[0]['texto_tr']; 

            ?>

            </strong>
          </p>
          
          <p><?php echo "Hasta: ".$triviaOK[0]['vig_fin_tr']; ?></p>
          
          <p>
            
          <!--form action="trivia.php" method="post"-->
          <form 
          
          <?php echo "action='pretriv.php?tr=".$triviaOK[0]['id_tr']."' "; ?>
          method="post">
            <input type="hidden" name="id_tr" id="id_tr"
            <?php echo "value='".$triviaOK[0]['id_tr']."'"; ?>
            >

            <button type="submit" class="w3-button w3-block w3-theme-l4">Info.</button>
          </form>

          </p>
        </div>
    </div>
      <br>
  <?php
  }
}

?>