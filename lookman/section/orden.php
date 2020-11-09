<?php

	$_limite=10;
	$_orden=2;

	if (isset($_GET['scat']))
		{
			$_sub_categoria=$_GET['scat'];
		}
	else
		{
			$_cat_producto=$_GET['catprod'];
		}

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$producto = new Producto($base);

	//if (isset($_sub_categoria)){$productoOK = $producto->getProductos($_limite,$_orden,$_sub_categoria);}
	if (isset($_sub_categoria)){$productoOK = $producto->getProductosXmarca($_limite,$_orden,$_sub_categoria);}

	if (isset($_cat_producto)){$productoOK  = $producto->getProductoXmarca($_limite,$_orden,$_cat_producto);}

?>

				<div class="mens-toolbar">					
					<p class="showing">Ordenar por

				        <select onchange="ordenar()" id="ordenar">
				            <option value="des">Destacado</option>
				            <option value="ran">Mejor Ranqueo</option>
				            <option value="aza">A - Z</option>
				            <option value="zaz">Z - A</option>
				        </select>

			        </p> 
					  
					<p>Mostrar hasta
			            <select>
			                  <option value=""> 9</option>
			                  <option value="">  10</option>
			                    <option value=""> 11 </option>
			                    <option value=""> 12 </option>
			            </select>
			        </p>
			        

					<p class="showing">Marcas
				        <select onchange="ordenar()" id="marca">
<?php
						echo "<option value='todo' selected>Todas</option>";

						for ($pezk0=0; $pezk0 < count($productoOK); $pezk0++) 
						{
							$_id_mark=$productoOK[$pezk0]['id_marca'];
							$_no_mark=$productoOK[$pezk0]['nom_marca'];
							echo "<option value='$_id_mark'>$_no_mark</option>";
						}
?>
				        </select>
			        </p> 

                	<div class="clearfix"></div>
		        </div>