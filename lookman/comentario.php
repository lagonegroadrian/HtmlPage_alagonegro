<?php

session_start();

require 'autoload.php';

$_trae=0; // inactivos
$_act="ACTIVAR";

if(isset($_GET['trae']))
{
	//$_nom=$_SESSION["_nom"];	
	if ($_GET['trae'] == 1)
		{
			$_trae=1;
			$_act="DESACTIVAR";
		}
}


		$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
		$listaCom = new Comentario($base);
		$listaComOK = $listaCom->getListarComentario($_trae);


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Classic Style a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Register :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>





















<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>









</head>
	
<body>

<!-- header -->
	<?php 
	include_once 'section/menu.php';
	?>
<!-- //header -->


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Comentarios</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Comentarios</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">


















			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
					<a href="comentario.php?trae=1" class="hvr-sweep-to-top">Activos</a>
			</div>

			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<a href="comentario.php?trae=0" class="hvr-sweep-to-top">Inactivos</a>
			</div>

			<br>
			<br>








<?php
if (isset($_msg)){
echo "<div class='contact-grid3'>";
echo "<div class='contact-grid1'>";
echo "<h4>$_msg</h4>";
echo "</div>";
echo "</div>";
}
?>



<table>
  <tr>
  	<th>ID COMEN</th>
    <th>ID PROD</th>
    <th>PRODUCTO</th>
    <th>OPINION</th>
    <th>USUARIO</th>
    <th>FECHA - HORA</th>
    <th>PUNTAJE</th>
    <th>CORREO</th>
    <th><?php echo $_act; ?> </th>
  </tr>
  
<?php
	for ($aux1=0; $aux1 < count($listaComOK); $aux1++) 
	{
		echo "<tr>";
			echo "<td>".$listaComOK[$aux1]['id_com']."</td>";
			echo "<td>".$listaComOK[$aux1]['id_prod']."</td>";
			echo "<td>".$listaComOK[$aux1]['producto']."</td>";
			echo "<td>".$listaComOK[$aux1]['comentario']."</td>";
			echo "<td>".$listaComOK[$aux1]['usuario']."</td>";
			echo "<td>".$listaComOK[$aux1]['fecha_hora']."</td>";
			echo "<td>".$listaComOK[$aux1]['punto']."</td>";			
			echo "<td>".$listaComOK[$aux1]['mail']."</td>";			
			
			echo "<td>";
?>

			<form action="funk/validarup.php?val=actcom" method="POST">
				<input type="hidden" name="id_comentario" 
<?php
				echo "value='".$listaComOK[$aux1]['id_com']."'";
?>
				>

				<input type="hidden" name="id_acc" 
<?php
				echo "value='".$_trae."'";
?>
				>

				<input type="submit" class="col-md-12" value="SI">
			</form>

<?php			
		echo "</td>";	
		echo "</tr>";
	}
?>


</table>




		






		</div>
	</div>
<!-- social -->
	<?php include("section/social.php"); ?>
<!-- //social -->

<!-- footer -->
	<?php include("section/footer.php"); ?>
<!-- //footer -->

</body>
</html>