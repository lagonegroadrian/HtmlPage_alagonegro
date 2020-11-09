
<?php
	
	$_usuario=$_SESSION['nrodoc_vnddor'];

	require 'autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);

	$pregunta = new Pregunta($base);
	$opcion = new Opcion($base);
	
	$preguntaOK = $pregunta->getPreguntas($_id_tr,$_usuario);

	//$cantPreg= count($preguntaOK);
	

	if ((gettype($preguntaOK))=='boolean')
		{	

		$rtas = new Respuesta($base);
		$rtasOK = $rtas->getCantRtas($_id_tr,$_usuario);
		
		$_cant_preg=$rtasOK[0]['cantPreguntas'];
		$_cant_corr=$rtasOK[0]['cantResCorrectas'];
		
		$_porc_corr=((($_cant_corr*1)*100)/$_cant_preg*1);

		$_mesj="Aprobaste, excelente performance!! <br><h3>Seguí así !! </h3>";
		$_boto="<a href='index.php' style='text-decoration:none;color:black;'> <button class='w3-button w3-block w3-green w3-section' title='Accept'>
					Ir a Incio como un/a Champio of de wor </button></a>";

		if ($_porc_corr < 50)
				{
					$_mesj="Mirá, la verdad no aprobaste ... queres volver a leer la docu y hacerlo de nuevo? 
					<br>
					Tranqui, no queda registro del error ... aprovecha para repasar :)
					<br> 
					<h3>Vos podes! </h3>
					";
					$_boto="
					<form action='funk/validoask.php?que=shh' method='POST'>
					<input type='hidden' name='id_triv' value='$_id_tr'>
					<input type='hidden' name='nrodoc_vnddor' value='$_usuario'>

					<button type='submit' class='w3-button w3-block w3-yellow w3-section' title='Accept'>
					
					<i class='fa fa-thumbs-up'></i> Realizar de nuevo </button>

					</form>";

				}
		
?>
	<div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">


				<h4>Muchas gracias por completar la trivia!</h4>	
				

				<p>
<?php
					echo $_mesj;
					echo $_boto;
?>
				</p>


            </div>
          </div>
        </div>
      </div>



<?php
		}
		else
		{
			$_id_ask=$preguntaOK[0]['id_pr'];
			$_det_ask=$preguntaOK[0]['descrip_pr'];
?>



<div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

			<form action="funk/validoask.php" method="POST">

				</br>
					<h3 class="w3-opacity"><?php echo " ".$_det_ask; ?></h3>
				</br>

				<input type="hidden" id="id_triv" name="id_triv" <?php echo "value='".$_id_tr."' "; ?>  >

  				<input type="hidden" id="id_ask" name="id_ask" <?php echo "value='".$_id_ask."' "; ?> >

			<?php

				$opcionOK = $opcion->getOpcion($_id_ask);
				$cantOpcion= count($opcionOK);
						
				for ($out=0; $out < $cantOpcion; $out++)
					{
					$_des_opt=$opcionOK[$out]['descrip_op'];
					$_id_opt=$opcionOK[$out]['id_op'];
			?>
					
					<input type="radio" class="w3-border w3-padding" name="id_opc" id="id_opc" 
					<?php echo "value='".$_id_opt."'"; ?> >
					<?php echo $_des_opt; ?>

					<br><br>
			<?php
				}
			?>
			</br>

			<button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Responder </button> 
			</form>
            </div>
          </div>
        </div>
      </div>

<?php	
};

?>