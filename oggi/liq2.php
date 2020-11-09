<?php
 require 'autoload.php';

  $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
  $liquidacion = new Liquidacion($base);
  

try{
    if(isset($_GET["codigo"])){
        //Agregar al carrito
        $liquidacionOK = $liquidacion->getLiquidacion($_GET["codigo"]);
        
        

        if(empty($liquidacionOK[0]['estadoSolicitud']))
          {
            echo "vacio";
          }else{
            echo "<div class='w3-container w3-padding'>";
        
              $_estado=$liquidacionOK[0]['estadoSolicitud'];
              $_nombre= echo $liquidacionOK[0]['nombre'].", ".$liquidacionOK[0]['apellido'];
              $_comercial=echo $liquidacionOK[0]['vendedor'];
              $_aporte=$liquidacionOK[0]['AporteMensual'];
              $_motivo=$liquidacionOK[0]['motivoCancelacion'];

?>
        
              <label class="w3-button w3-block w3-theme-l1 w3-left-align"> Estado 
                <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo $_estado; ?></label>

                <label class="w3-button w3-block w3-theme-l1 w3-left-align"> Nombre 
                <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo $_nombre; ?> </label>

                <label class="w3-button w3-block w3-theme-l1 w3-left-align"> Comercial 
                <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo $_comercial; ?></label>

                <label class="w3-button w3-block w3-theme-l1 w3-left-align"> Aporte 
                <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo $_aporte; ?></label>
<?php
  //if ($_estado == 'CANCELADA') 
  //            { 
?>
                <button onclick="myFunction('Demo19')" class="w3-button w3-block w3-theme-l1 w3-left-align">Motivo de Cancelacion
                <i class="fa fa-angle-double-down fa-fw w3-margin-right"></i> </button>

                <div id="Demo19" class="w3-hide w3-container">
                  <p><?php echo $_motivo; ?></p>
                </div>

<?php
//                }

            echo "</div>";
          }
    }
}catch(Exception $e ){
    echo "error";
}
?>