<?php

$tipo_pedido = new Tipopedido($base);
$_estado = "1";// solo activos
$Lista_tipo_pedido = $tipo_pedido->getTipopedido($_estado);

?>

<div id="id02" class="modal">    


<div class="ps-pedido">

<div class="container ps-subscribe" >
  





















                    <form class="ps-product__review" action="barrera/barrera_new_pedido.php" method="POST" 
                    id="crear_pedido">

                    <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            

                            <div class="form-group">
                              <label>Indicar Motivo<span></span></label>
                              
                              <div class="ps-product__filter">
                                <select class="ps-select selectpicker" id="new_pedido_tipo" name="new_pedido_tipo">
                                  
                                  <?php
                                    for ($aux=0; $aux < count($Lista_tipo_pedido); $aux++) 
                                    { 
                                  ?>

                                  <option value=<?php echo "'".$Lista_tipo_pedido[$aux]['id_tipd2']."'"; ?> >
                                  <?php echo $Lista_tipo_pedido[$aux]['titulo_tipd2']; ?>
                                  </option>

                                  <?php
                                  }
                                  ?>

                                </select>
                              </div>

                            </div>
                          </div>

                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="form-group">
                              <label>Mensaje</label>
                              <textarea class="form-control" rows="6"  name="new_pedido_mensaje" id="new_pedido_mensaje"></textarea>
                            </div>
                            
                            <div class="form-group">
                              <!--button class="ps-btn ps-btn--sm">Cargar<i class="ps-icon-next"></i></button-->

        
        <a href="#" class="vervde_ok btn" onclick="funcion_crear_pedido()"><i class="fa fa-check-circle-o fa-fw">
          </i> Crear Pedido
        </a>




        <a href="#" class="google btn" onclick="document.getElementById('id02').style.display='none'"><i class="fa fa-times-circle fa-fw">
          </i> Cancelar
        </a>






















                            </div>

                          </div>
                    </div>
                  </form>



</div>



</div>

</div>




<script>
        function funcion_crear_pedido() { document.getElementById("crear_pedido").submit();}
</script>