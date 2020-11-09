<?php

session_start();

require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$producto = new Producto($base);
$cate_menu = $producto->getCategoria();

?>
<div class="navigation__column center">
  <ul class="main-menu menu">
    <li class="menu-item"><a href="index.php">Home</a>
      <!--ul class="sub-menu">
        <li class="menu-item"><a href="index.html">Homepage #1</a></li>
        <li class="menu-item"><a href="#">Homepage #3</a></li>
      </ul-->
    </li>

<?php


if(!isset($_SESSION["id_usu"]))
{

for ($_aux=0; $_aux < count($cate_menu) ; $_aux++) {
$asub_menu = $producto->getAgrupadorSubCategoria($cate_menu[$_aux]['id_cate']);
  
?>
    <li class="menu-item menu-item-has-children has-mega-menu">
      <a href="#"> <?php echo $cate_menu[$_aux]['texto_cate']; ?> </a> <!--  categoria  -->
        <div class="mega-menu">
          <div class="mega-wrap">
          <?php  include_once 'section/acceso_directo.php'; ?>
<?php   

            for ($_aux1=0; $_aux1 < count($asub_menu) ; $_aux1++) {    
            $subc_menu = $producto->getSubCategoria($asub_menu[$_aux1]['id_asub']);           
?>

              <div class="mega-column">
                <h4 class="mega-heading"> <?php echo $asub_menu[$_aux1]['texto_asub']; ?></h4>  <!--  agrupador  -->
                  <ul class="mega-item">

<?php
  for ($_aux2=0; $_aux2 < count($subc_menu); $_aux2++) 
  { 
?>
                    <li><a 
                      
                      <?php echo " href='productos.php?subc=".$subc_menu[$_aux2]['id_subc']."' "; ?>
                      
                      >
                      <?php echo $subc_menu[$_aux2]['texto_subc']; ?></a></li> <!-- subcategoria  -->
<?php 
      } 
?>
                  </ul>
              </div>
<?php   } ?>
          </div>
        </div>
    </li>
<?php
      }
}
else
{

?>

<li class="menu-item"><a href="index_usere.php">Pedidos</a>
<li class="menu-item"><a href="#contacto">Presupuestos</a>
<li class="menu-item"><a href="#contacto">Facturas</a>

<?php

}
?>



                  <li class="menu-item"><a href="#contacto">Contacto</a>

                        <!--ul class="sub-menu">
                          <li class="menu-item"><a href="contact-us.html">Contact Us #1</a></li>
                          <li class="menu-item"><a href="contact-us.html">Contact Us #2</a></li>
                        </ul-->
                  </li>
            </ul>
        </div>
