<?php

session_start();

require 'autoload.php';

if (!isset($_SESSION["_idu"]) || $_SESSION["_per"] !== 'admin')
{
			echo "<script type='text/javascript'>";
			echo "window.location='index.php'";
			echo "</script>";	
}


if(isset($_GET['er']))
{
	$_nom=$_SESSION["_nom"];
	switch ($_GET['er']) 
	{
		case 1:
			$_msg="Complete todos los campos";
			break;

		case 2:
			$_msg="Ya existe el usuario, probá con otro";
			break;
		
		case 3:
			$_msg="Las contraseñas no coinciden";
			break;			
		
		default:
			$_msg="Revisar los datos ingresados";
			break;
	}
}

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$catePro = new CategoriaProducto($base);
$categorias = $catePro->getCategoria();
$cateProOK = $catePro->getCategoriaProductoz(1); // para que solo traiga los activos

$mark = new Marca($base);
$markOK = $mark->getMarcaz(1); // para que solo traiga los activos

$_id_subcat="1141972283";
$_id_catprod="1141972283";

if(isset($_POST['id_producto']))
{	
	$_id_producto=$_POST['id_producto'];
	$_titulo=$_POST['titulo'];
	$_prod_descripcion=$_POST['prod_descripcion'];
	$_descripcion_detallada=$_POST['descripcion_detallada'];
	$_precio=$_POST['precio'];
	$_id_marca_producto=$_POST['id_marca_producto'];
	$_marca=$_POST['marca'];
	$_id_genero=$_POST['id_genero'];
	$_puntaje=$_POST['puntaje'];
	$_isactivo=$_POST['isactivo'];
	$_destacado=$_POST['destacado'];
	$_catprod=$_POST['catprod'];
	$_titulo_catprod=$_POST['titulo_catprod'];
	$_imagen_filesystem=$_POST['imagen_filesystem'];
	$_tama_descripcion=$_POST['tama_descripcion'];
	$_id_subcat=$_POST['id_subcat'];
	$_id_catprod=$_POST['id_catprod'];
	$_id_categoria=$_POST['id_categoria'];
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>LookMacho - Alta Producto</title>
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
<script src="js/aproducto.js"></script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'></head>
	
<body>

<!-- header -->
	<?php 
	include_once 'section/menu.php';
	?>
<!-- //header -->


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Alta Producto</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Alta Producto</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">

<?php
if (isset($_msg)){
echo "<div class='contact-grid3'>";
echo "<div class='contact-grid1'>";
echo "<h4>$_msg</h4>";
echo "</div>";
echo "</div>";
}
?>

		<form action="funk/validarup.php?val=producto" method="POST" enctype="multipart/form-data">
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				
				<input type="hidden" name="id_producto" 
				<?php	if(isset($_id_producto)) {echo "value='".$_id_producto."' "; } ?> 
				>

				<div class="login-mail">
					<input type="text" id="nom_prod" name="nom_prod" placeholder="Nombre producto" required=""
					<?php
					//if (isset($_nom) && isset($_titulo)) {echo "value='".$_nom."'";}
					//else {echo "value='".$_titulo."'";}
					if (isset($_titulo)) {echo "value='".$_titulo."'";}
					?>
					>
					<i class="glyphicon glyphicon-envelope"></i>
				</div>

				<div class="login-mail">
					<input type="text" id="desc_prod" name="desc_prod" placeholder="Desscripcion producto" required=""

					<?php
					if (isset($_prod_descripcion)) {echo "value='".$_prod_descripcion."'";}
					?>

					>
					<i class="glyphicon glyphicon-lock"></i>
				</div>


				<div class="login-mail">
					<input type="text" id="detall_prod" name="detall_prod" placeholder="Desscripcion Detallada producto" required=""

					<?php
					if (isset($_descripcion_detallada)) {echo "value='".$_descripcion_detallada."'";}
					?>

					>
					<i class="glyphicon glyphicon-lock"></i>
				</div>				
				
				<div class="login-mail">
					<input type="number" id="precio_prod" name="precio_prod" placeholder="Precio producto" required="" 
					<?php
					if (isset($_precio)) {echo "value='".$_precio."'";}
					?>
					style=" border: 1px solid #FFFFFF !important;">
				</div>

				<div class="login-mail">
					<select id="marka" name="marka" style=" border: 1px solid #FFFFFF !important;">
<?php
					for ($aux=0; $aux < count($markOK); $aux++) 
					{
						$_filtrero="";
						$id_marca=$markOK[$aux]['id_marca'];
						$decripcion_marca=$markOK[$aux]['descripcion'];
						$activo_marca=$markOK[$aux]['activo'];

						if (isset($_id_marca_producto) && $_id_marca_producto==$id_marca) {$_filtrero=" selected ";}

						echo "<option value='$id_marca' $_filtrero> $decripcion_marca </option>";}
?>					  
					</select>
					<!--i class="glyphicon glyphicon-lock"></i-->
				</div>

				<div class="login-mail">
					<input type="number" id="destac_prod" name="destac_prod" placeholder="Destacado" required="" style=" border: 1px solid #FFFFFF !important;"
					
					<?php
					if (isset($_destacado)) {echo "value='".$_destacado."'";}
					?>

					>
				</div>

                <!-- seleccion cascada -->


                <div class="login-mail">
                    <label for="categoria" class="d-none">Categoria</label>
					<select id="categoria" name="categoria" style=" border: 1px solid #FFFFFF !important;">
                    <?php
                        echo "<option value='0'>Seleccione un valor</option>";
                        for ($aux=0; $aux < count($categorias); $aux++)
                        {
                        	$_filtrero="";
                            $id_categoria=$categorias[$aux]['id_categoria'];
                            $categoria_detalle=$categorias[$aux]['detalle_cat'];

                        	if (isset($_id_categoria) && $_id_categoria==$id_categoria) {$_filtrero=" selected ";}

                            echo "<option value='".$id_categoria."' $_filtrero> ".$categoria_detalle." </option>";
                        }
                    ?>
					</select>
					<!--i class="glyphicon glyphicon-lock"></i-->
				</div>
                
				<!-- Para evitar cargar el js siempre que ingresa -->
                <input type="hidden" name="id_subcategory" id="id_subcategory" <?php echo "value='".$_id_subcat."'"; ?> >


                <input type="hidden" name="id_ktgory_prd" id="id_ktgory_prd" <?php echo "value='".$_id_catprod."'"; ?> >


				<div class="login-mail">
				    <label for="subcategoria" class="d-none">Sub - categoria</label>
					<select id="subcategoria" name="subcategoria" style=" border: 1px solid #FFFFFF !important;">		
					</select>
					
					<!--i class="glyphicon glyphicon-lock"></i-->
				</div>
				
				<div class="login-mail">
				    <label for="categoriaproducto" class="d-none">Categoria - producto</label>
					<select id="categoriaproducto" name="categoriaproducto" style=" border: 1px solid #FFFFFF !important;">
                    </select>
				</div>
                
				<div class="login-mail">
                    <label for="imagen" class="d-none">Imagen</label>



						<div  class=" grid-product " >
							<figure>		

									<div class="grid-img">
										<img  										
<?php
										echo "src='images/prods/".$_id_producto."/".$_imagen_filesystem."'";
										echo "alt='".$_imagen_filesystem."'";
?>

										class="img-responsive" >
									</div>

							</figure>
						</div>

					<!--label class="checkbox1"><input type="checkbox" name="checkbox"  id="checkbox"><i> </i>Cambiar Imagen</label-->

                    <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                    <small id="fileHelpId" class="form-text text-muted">El formato de la imagen debe ser <b>PNG / JPG</b></small>
                </div>

			</div>

<?php			
			$etrue=" checked ";
			if($_isactivo==1){ $etrue="  ";}
?>
			<a class="news-letter" href="#">
			<label class="checkbox1">
			<input type="checkbox" name="desactivo" id="desactivo" <?php echo $etrue; ?> ><i> </i>Desactivar Producto
			</label>
			</a>

			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
					
					<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Guardar">
					</label>
					

			</div>
			<div class="clearfix"> </div>
			</form>
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