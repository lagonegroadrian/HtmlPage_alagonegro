<?php

/*
Validaciones para:
0-valore nulos
1-injection
2-cantidad de caracteres
*/


$pedido = new Pedido($base);

$Lista_Pedidos = $pedido->getPedido();


?>



      <!--div class="ps-blog-grid pt-80 pb-80"-->
      <div class="ps-blog-grid pt-15 pb-15">
        <div class="ps-container">
          <div class="row">
                














                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                  <!--aside class="ps-widget--sidebar ps-widget--search">
                    <form class="ps-search--widget" action="do_action" method="post">
                      <input class="form-control" type="text" placeholder="Search posts...">
                      <button><i class="ps-icon-search"></i></button>
                    </form>
                  </aside-->







                  <aside class="ps-widget--sidebar">
                    
                    <div class="ps-widget__header">

                          <!--h3>Pedidos</h3-->
                     
                          <!--a class="ps-btn" href="#" onclick="document.getElementById('id02').style.display='block'" >
                              Pedidos<i class="ps-icon-next"> Crear</i>
                          </a-->
                          

                        <button class="ps-btn ps-btn--sm ps-contact__submit" 
                        onclick="document.getElementById('id02').style.display='block'"
                        >Crear Pedido<i class="ps-icon-next"></i></button>


                    </div>
                    <div class="ps-widget__content">
                      
<?php
    for ($i=0; $i < count($Lista_Pedidos) ; $i++) 
    {       
?>  

      <div class="ps-post--sidebar">
        
        <div class="ps-post__thumbnail">
          <a href=<?php echo "'"."index_usere.php?id=".$Lista_Pedidos[$i]['id_pd2']."'"; ?>
          >            
          </a>
          <img src="images/blog/sidebar/2.jpg" alt="">
        </div>

        <div class="ps-post__content">
          
          <a class="ps-post__title" href="#">
              <?php echo $Lista_Pedidos[$i]['titulo_tipd2']; ?>
          </a>

          <span>
            <?php echo $Lista_Pedidos[$i]['mensaje_pd2']." ..."; ?>
          </span>

          <span>
            <?php echo $Lista_Pedidos[$i]['cuando_pd2']; ?>
          </span>

        </div>

      </div>


<?php
    }
?>
        
                      
      

                    </div>
                  </aside>
                  
                 
                  


                </div>
          </div>
        </div>
      </div>

      <?php  include_once 'dash_pedido_crear.php'; ?>    