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

		$_estao="1,0"; // pa que traiga los activoes e inactivos
		$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
		$cateprod = new CategoriaProducto($base);
		$prod = new Producto($base);

		$prodOK = $prod->getProdz($_estao);
		//$cateprodOK = $cateprod->getCategoriaProductoz(1); //solo los activos

		//echo "<pre>";
		//print_r($prodOK);
		//echo "</pre>";

		
		//echo "---> <br> <pre>";
		//print_r($cateprodOK);
		//echo "</pre>";


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>LOOKMacho-ABM Producto</title>
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
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Producto</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Producto</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">


			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
					<a href="aproducto.php" class="hvr-sweep-to-top">Crear Producto</a>
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
  	<th>Titulo</th>
    <th>Descripcion</th>
    <th>Detallada</th>
    <th>precio</th>
    <th>Marca</th>
    <th>Puntaje</th>
    <th>Estado</th>
    <th>Destacado</th>
    <th>Categoria Producto</th>
    <!--th>Imagen</th-->
    <th>Accion</th>
  </tr>
  
<?php
	for ($aux1=0; $aux1 < count($prodOK); $aux1++) 
	{
		if ($prodOK[$aux1]['isactivo'] == 1 ){$_act="ACTIVO";}else{$_act="INACTIVO";}

		$_id_producto=$prodOK[$aux1]['id_producto'];
 		$_titulo=$prodOK[$aux1]['titulo'];
		$_prod_descripcion=$prodOK[$aux1]['prod_descripcion'];
		$_descripcion_detallada=$prodOK[$aux1]['descripcion_detallada'];
		$_precio=$prodOK[$aux1]['precio'];
		$_id_marca_producto=$prodOK[$aux1]['marca_producto'];
		$_marca=$prodOK[$aux1]['marca'];
		$_id_genero=$prodOK[$aux1]['id_genero'];
		$_puntaje=$prodOK[$aux1]['puntaje'];
		$_isactivo=$prodOK[$aux1]['isactivo'];
		$_destacado=$prodOK[$aux1]['destacado'];
		$_catprod=$prodOK[$aux1]['catprod'];
		$_titulo_catprod=$prodOK[$aux1]['titulo_catprod'];
		$_imagen_filesystem=$prodOK[$aux1]['imagen_filesystem'];
		$_tama_descripcion=$prodOK[$aux1]['tama_descripcion'];
		$_id_subcat=$prodOK[$aux1]['id_subcat'];
		$_id_catprod=$prodOK[$aux1]['id_catprod'];
		$_id_categoria=$prodOK[$aux1]['id_categoria'];
		

		echo "<tr>";			
			echo "<td>".$_titulo."</td>";
			echo "<td>".$_prod_descripcion."</td>";
			echo "<td>".$_descripcion_detallada."</td>";
			echo "<td>".$_precio."</td>";
			echo "<td>".$_marca."</td>";
			echo "<td>".$_puntaje."</td>";
			echo "<td>".$_act."</td>";
			echo "<td>".$_destacado."</td>";
			echo "<td>".$_titulo_catprod."</td>";
			//echo "<td> <img src='images/prods/$_id_producto/$_imagen_filesystem' alt='' height='10%' width='20%'/> </td>";
			echo "<td>";
?>
				<form action="aproducto.php" method="POST">

				<input type="hidden" name="id_producto" <?php	echo "value='".$_id_producto."'"; ?> >
				<input type="hidden" name="titulo" <?php	echo "value='".$_titulo."'"; ?> >
				<input type="hidden" name="prod_descripcion" <?php	echo "value='".$_prod_descripcion."'"; ?> >
				<input type="hidden" name="descripcion_detallada" <?php	echo "value='".$_descripcion_detallada."'"; ?> >
				<input type="hidden" name="precio" <?php	echo "value='".$_precio."'"; ?> >
				<input type="hidden" name="id_marca_producto" <?php	echo "value='".$_id_marca_producto."'"; ?> >
				<input type="hidden" name="marca" <?php	echo "value='".$_marca."'"; ?> >
				<input type="hidden" name="id_genero" <?php	echo "value='".$_id_genero."'"; ?> >
				<input type="hidden" name="puntaje" <?php	echo "value='".$_puntaje."'"; ?> >
				<input type="hidden" name="isactivo" <?php	echo "value='".$_isactivo."'"; ?> >
				<input type="hidden" name="destacado" <?php	echo "value='".$_destacado."'"; ?> >
				<input type="hidden" name="catprod" <?php	echo "value='".$_catprod."'"; ?> >
				<input type="hidden" name="titulo_catprod" <?php	echo "value='".$_titulo_catprod."'"; ?> >
				<input type="hidden" name="imagen_filesystem" <?php	echo "value='".$_imagen_filesystem."'"; ?> >
				<input type="hidden" name="tama_descripcion" <?php	echo "value='".$_tama_descripcion."'"; ?> >
				<input type="hidden" name="id_subcat"  <?php	echo "value='".$_id_subcat."'";  ?> >
				<input type="hidden" name="id_catprod" <?php	echo "value='".$_id_catprod."'"; ?> >

				<input type="hidden" name="id_categoria" <?php	echo "value='".$_id_categoria."'"; ?> >
				

				<input type="submit" class="hvr-sweep-to-top" value="Modificar ">
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