         <!-- inicio de barra lateral donde datos del carrito de compras -->
          <div class="navigation__column right">
            



            <div class="ps-cart">

              

              

<?php
          session_start();

          if(!isset($_SESSION["id_usu"]))
            {
?>
            <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto; color:black;">
            <span>
              <img src="images/029-mirror-1.png" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
            </span>
            </a>
<?php  
            }
            else
            {
?>
            <a href="barrera/barrera_logout.php" style="width:auto; color:black;">
            <span>
              <img src="images/008-cancel-2.png" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
            </span>
            </a>
<?php  
            }; 
?>
                
              

            </div>
            <div class="menu-toggle"><span></span></div>
          </div>
          <!-- fin de barra lateral donde datos del carrito de compras -->