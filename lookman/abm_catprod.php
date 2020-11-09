<?php

session_start();

require 'autoload.php';

$_trae=0; // inactivos

if(isset($_GET['trae']))
{
	if ($_GET['trae'] == 1)
		{
			$_trae=1;
		}
}

		$_estao="1,0";
		$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
		$catprod = new CategoriaProducto($base);
		$catProdOK = $catprod->getCategoriaProductoz($_estao);		

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>LOOKMacho-ABM categoria producto</title>
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
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Categoria Producto</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Categoria Producto</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">


			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
					<a href="catprod.php" class="hvr-sweep-to-top">Crear Categoria Producto</a>
			</div>

			<br>
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
  	<th>Nombre</th>
    <th>Estado</th>
    <th>Categoria</th>
    <th>SubCategoria</th>
    <th>Accion</th>
  </tr>
  
<?php
	for ($aux1=0; $aux1 < count($catProdOK); $aux1++) 
	{
		if ($catProdOK[$aux1]['activo'] == 1 ){$_act="ACTIVO";}else{$_act="INACTIVO";}

		echo "<tr>";			
			echo "<td>".$catProdOK[$aux1]['titulo_catprod']."</td>";
			echo "<td>".$_act."</td>";
			echo "<td>".$catProdOK[$aux1]['detalle_cat']."</td>";
			echo "<td>".$catProdOK[$aux1]['detalle_subcat']."</td>";
			echo "<td>";
?>
				<form action="catprod.php" method="POST">

				<input type="hidden" name="id_catprod" 
				<?php			echo "value='".$catProdOK[$aux1]['id_catprod']."'"; ?> >

				<input type="hidden" name="titulo_catprod" 
				<?php			echo "value='".$catProdOK[$aux1]['titulo_catprod']."'"; ?> >

				<input type="hidden" name="activo" 
				<?php			echo "value='".$catProdOK[$aux1]['activo']."'"; ?> >

				<input type="hidden" name="id_categoria" 
				<?php			echo "value='".$catProdOK[$aux1]['id_categoria']."'"; ?> >

				<input type="hidden" name="detalle_cat" 
				<?php			echo "value='".$catProdOK[$aux1]['detalle_cat']."'"; ?> >

				<input type="hidden" name="id_subcat" 
				<?php			echo "value='".$catProdOK[$aux1]['id_subcat']."'"; ?> >

				<input type="hidden" name="detalle_subcat" 
				<?php			echo "value='".$catProdOK[$aux1]['detalle_subcat']."'"; ?> >

				<input type="submit" class="col-md-6" value="Modificar">
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