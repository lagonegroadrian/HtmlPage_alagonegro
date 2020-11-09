<?php

$pedido = new Pedido($base);
$Pedido_inicial = $pedido->getUnPedido($_GET['id']);

?>

      <div class="ps-blog-grid pt-10 pb-10">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <div class="ps-post--detail">
                    
                    <!--div class="ps-post__thumbnail"><img src="images/blog/11.png" alt=""></div-->
                    <h1>

                      <?php
                        echo "Pedido #".$Pedido_inicial[0]['id_pd2']." (".$Pedido_inicial[0]['titulo_tipd2'].") ";
                      ?>

                    </h1>

                  </div>
                  
                  <div class="ps-author">
                    
                    <!--div class="ps-author__thumbnail"><img src="images/user/1.jpg" alt=""></div-->

                    <div class="ps-author__content">
                      <header>
                        <h4>MARK GREY</h4>
                        
                        <p>
                          <?php
                            echo $Pedido_inicial[0]['cuando_pd2'];
                          ?>
                        </p>

                      </header>
                      <p>
                      
                          <?php
                            echo $Pedido_inicial[0]['mensaje_pd2'];
                          ?>

                      </p>
                    </div>
                  </div>

                  <div class="ps-comments">
                    <h3>Comment(4)</h3>
                    <div class="ps-comment">
                      
                      <!--div class="ps-comment__thumbnail"><img src="images/user/2.jpg" alt=""></div-->

                      <div class="ps-comment__content">
                        <header>
                          <h4>MARK GREY <span>(15 minutes ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                        </header>
                        <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                      </div>
                    </div>
                    <div class="ps-comment ps-comment--reply">
                      
                      <!--div class="ps-comment__thumbnail"><img src="images/user/3.jpg" alt=""></div-->

                      <div class="ps-comment__content">
                        <header>
                          <h4>MARK GREY <span>(3 hours ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                        </header>
                        <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses  continue ace explore.</p>
                      </div>
                    </div>
                    <div class="ps-comment">
                      
                      <!--div class="ps-comment__thumbnail"><img src="images/user/4.jpg" alt=""></div-->

                      <div class="ps-comment__content">
                        <header>
                          <h4>MARK GREY <span>(1 day ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                        </header>
                        <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                      </div>
                    </div>
                  </div>
                  



                  <form class="ps-form--comment" action="do_action" method="post">
                    <h3>Responder</h3>
                    <div class="row">
                          

                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="Subject">
                            </div>
                          </div>



                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="form-group">
                              <textarea class="form-control" rows="6" placeholder="Text your message here..."></textarea>
                            </div>
                          </div>
                    </div>
                    <div class="form-group">
                      <button class="ps-btn ps-btn--sm ps-contact__submit">Enviar<i class="ps-icon-next"></i></button>
                    </div>
                  </form>
                </div>
          </div>
        </div>
      </div>