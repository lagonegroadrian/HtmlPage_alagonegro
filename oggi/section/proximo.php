<?php
//  require 'autoload.php';
  
  $_usuario=$_SESSION['nrodoc_vnddor'];
  $_per_se=$_SESSION['id_pe'];

  $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
  $trivia = new Trivia($base);
  $triviaOK = $trivia->getTriviasDisponible($_usuario,$_per_se);


if(!(is_bool($triviaOK)))
{

  $_per_tr=$triviaOK[0]['perfil_tr']; 

  $pos = strpos($_per_tr, $_per_se);

  if (($triviaOK) && is_numeric($pos))
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