<?php

$_limite=10;
$_orden=2;

if (isset($_GET['ord']))
{
	require '../autoload.php';
	
	switch ($_GET['ord'])
	{
	    case "ran": $_orden='9 DESC '; break;
	    case "aza": $_orden='4 ASC '; break;
	    case "zaz": $_orden='4 DESC '; break;
	    default: $_orden=4; break;
	}

	if (isset($_GET['scat']))
	{
		$_sub_categoria=$_GET['scat'];
		if (isset($_GET['filtro'])){$_filtro=$_GET['filtro'];}
	}
	else
	{
		$_cat_producto=$_GET['catprod'];
		if (isset($_GET['filtro'])){$_filtro=$_GET['filtro'];}
	}
}

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$producto = new Producto($base);

if (isset($_sub_categoria))
	{
		if (isset($_filtro))
		{
			$productoOK = $producto->getProductosFiltrao($_limite,$_orden,$_sub_categoria,$_filtro);
			$aca="cero";
		}
		else
		{
			$productoOK = $producto->getProductos($_limite,$_orden,$_sub_categoria);
			$aca="uno";
		}
	}

if (isset($_cat_producto))
{	

	if (isset($_filtro))
		{
			$productoOK = $producto->getProductoFiltrao($_limite,$_orden,$_cat_producto,$_filtro);
			$aca="dos";
		}
	else
		{
			$productoOK = $producto->getProducto($_limite,$_orden,$_cat_producto);
			$aca="tres";
		}	

}


if (((isset($productoOK)) === true) && (is_bool($productoOK))){	$_cant=0;}
else {$_cant=count($productoOK);}


?>
			<div class="mid-popular" >
				
<?php

			for ($aux=0; $aux < $_cant; $aux++) 
			{

			$_cat_pr=$productoOK[$aux]['catprod'];
            $_ide_pr=$productoOK[$aux]['id_producto'];
            $_img_pr=$productoOK[$aux]['id_imagen'];
            $_tit_pr=$productoOK[$aux]['titulo'];
            $_des_pr=$productoOK[$aux]['pro_descripcion'];
            $_det_pr=$productoOK[$aux]['descripcion_detallada'];
            $_pre_pr=$productoOK[$aux]['precio'];
            $_fil_pr=$productoOK[$aux]['imagen_filesystem'];
            $_pun_pr=$productoOK[$aux]['puntaje'];
?>
				<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
					<div class="grid-pro">
						<div  class=" grid-product " >
							<figure>		
								<a 
<?php
								echo "href='single.php?pr=".$_ide_pr."' ";
?>
								>
									<div class="grid-img">
										<img  
<?php
										echo "src='images/prods/".$_ide_pr."/".$_fil_pr."'";
										echo "alt='".$_tit_pr."'";
?>

										class="img-responsive" >
									</div>
								</a>
							</figure>
						</div>
						<div class="men">
							<!--a href="#"><img src="images/ll.png" alt=""></a-->
							<h6>

								<a 
<?php
								echo "href='single.php?pr=".$_ide_pr."' ";
?>
								>

<?php
							echo "$_tit_pr";
?>

							</a></h6>
							<p ><del>
<?php
							echo "$ ".$_pre_pr*1.3;
?>
							</del><em class="item_price">
<?php
							echo "$ ".$_pre_pr;
?>
							</em></p>
							<a href="#" data-text="+ Carrito" class="but-hover1 item_add">+ Carrito</a>
						</div>
					</div>
				</div>


<?php
			}			
?>

					<div class="clearfix"></div>
				</div>
<?php
if (isset($_GET['ord'])){}
?>