<?php

 $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
 $categoria = new Categoria($base);
 $subcategoria = new SubCategoria($base);
 $categoriaproducto = new CategoriaProducto($base);

 $categoriaOK = $categoria->getCategoria(1); // categoria=1--> activo

?>
			<!--categories-->
			<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Categorias</h3>
					<ul class="cate">
<?php
						 for ($aux1=0; $aux1 < count($categoriaOK); $aux1++)
						 	{
						 	$_id_cat=$categoriaOK[$aux1]['id_categoria'];
						 	$_det_cat=$categoriaOK[$aux1]['detalle_cat'];
				 			$sub_categoriaOK = $subcategoria->getSubCategoria($_id_cat);
				 			$cantSubC=count($sub_categoriaOK);
?>
						<li>
							<i class="glyphicon glyphicon-menu-right" ></i>
							<?php echo "$_det_cat"; ?>
							<span>( <?php echo $cantSubC; ?> )</span>
						</li>
						<ul>
<?php
						for ($aux2=0; $aux2 < count($sub_categoriaOK); $aux2++)
						{
						    $_id_sub_cat=$sub_categoriaOK[$aux2]['id_subcat'];
						    $_det_sub_cat=$sub_categoriaOK[$aux2]['detalle_subcat'];
						    $cat_productoOK=$categoriaproducto->getCategoriaProducto($_id_sub_cat);
						    $cantProd = count($cat_productoOK);
?>			
							<li>
							<i class="glyphicon glyphicon-menu-right" ></i>
							<a 
<?php
							echo "href='producto.php?scat=".$_id_sub_cat."'";
?>

							>
<?php 					
							echo "$_det_sub_cat"; 
?> 
							</a> 
							<!--span>( <?php //echo $cantProd; ?> )</span-->
							</li>
<?php
						}
?>							
				</ul>
<?php
							}
?>
					</ul>
				</div>