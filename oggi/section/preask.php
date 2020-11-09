
<div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            	
          <form 
<?php

          echo " action='trivia.php?tr=".$_id_tr."' ";
?>

          method="GET">

					<h4>Estas Listo para comenzar la trivia?</h4>
					<p>Ayuda: a la derecha tenes documentacion para leer antes de comenzar con la trivia ;)</p>
          <input type="hidden" name="id_tr"

<?php          
	         echo "value='".$_id_tr."'"
?>
          >

					<button type="submit" class="w3-button w3-theme"><i class="fa fa-check"></i> Estoy Listo! </button> 
					<i class="fas fa-fist-raised"></i>

				</form>
            </div>
          </div>
        </div>
      </div>


