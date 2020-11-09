<?php  if(!isset($_GET['subc'])){ header("Location: 404.php");  exit;}else{  $_id_subc=$_GET['subc'];} ?>

<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="es">
  <?php  include_once 'section/head_html.php'; ?>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body class="ps-loading">
    <?php  include_once 'section/cabecera.php'; ?>
    <?php  include_once 'section/slice.php'; ?>
    <main class="ps-main">
      <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
          <?php  include 'section/filtro_orden.php'; ?>
          <div class="ps-product__columns">
<?php
  $productos = $producto->getProducto($_id_subc);
  if(!isset($productos[0]['id_prod'])){echo "<script type='text/javascript'> window.location='404.php' </script>";}
  for ($_cant=0; $_cant < count($productos); $_cant++) 
  { 
    $_id_prod=$productos[$_cant]['id_prod'];
    $_titulo_prod=$productos[$_cant]['titulo_prod'];
    $_descripcion_prod=$productos[$_cant]['descripcion_prod'];
    $_detalle_prod=$productos[$_cant]['detalle_prod'];
    $_precio_prod=$productos[$_cant]['precio_prod'];
    $_id_subc=$productos[$_cant]['id_subc'];
    $_estado_prod=$productos[$_cant]['estado_prod'];
    $_texto_subc=$productos[$_cant]['texto_subc'];
    $_texto_asub=$productos[$_cant]['texto_asub'];
?>
            <div class="ps-product__column">
              <div class="ps-shoe mb-30">
                <div class="ps-shoe__thumbnail">                                    
                  <?php  include 'section/producto_nuevo.php'; ?>
                  <?php  include 'section/producto_descuento.php'; ?>
                  <?php  include 'section/producto_favorito.php'; ?>
                  <?php  include 'section/producto_imagen_principal.php'; ?>
                  <a class="ps-shoe__overlay" <?php  echo "href='producto_detalle.php?producto=".$_id_prod."' "; ?> ></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <?php  include 'section/producto_imagen.php'; ?>
                    <?php  include 'section/producto_ranking.php'; ?>
                  </div>
                  <div class="ps-shoe__detail">
                    <a class="ps-shoe__name" href="#"><?php  echo $_titulo_prod; ?></a>
                    <p class="ps-shoe__categories"><a href="#"><?php  echo $_texto_asub.", ".$_texto_subc; ?></a></p>
                    <span class="ps-shoe__price"><del>£220</del> £ 120</span>
                  </div>
                </div>
              </div>
            </div>
<?php
  }
?>
        </div>
          <?php  include 'section/filtro_orden.php'; ?>
        </div>

        <div class="ps-sidebar" data-mh="product-listing">
          <?php  include_once 'section/filtro_categoria.php'; ?>
          <?php  include_once 'section/filtro_precio.php'; ?>
          <?php  include_once 'section/filtro_marca.php'; ?>
          <?php  include_once 'section/filtro_talle.php'; ?>

          <div class="ps-sticky desktop">
            <?php  include_once 'section/filtro_medida.php'; ?>
            <?php  include_once 'section/filtro_color.php'; ?>
          </div>
        </div>
      </div>

      <?php  include_once 'section/suscribirse.php'; ?>
      <?php  include_once 'section/footer.php'; ?>

    </main>
    <!-- JS Library-->
    <?php  include_once 'section/plugins_js.php'; ?>

    <!-- Custom scripts-->
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>