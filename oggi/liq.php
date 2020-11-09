<?php
 require 'autoload.php';

  $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
  $liquidacion = new Liquidacion($base);
  
try{

    if(isset($_GET["codigo"])){     
      
        $liquidacionOK = $liquidacion->getLiquidacion($_GET["codigo"]);
    
        if(empty($liquidacionOK[0]['estadoSolicitud'])){
          echo "<h3 style='background-color:#f7ce00;  text-align: center; ' >DNI NO ENCONTRADO</h3> "; 
        }
        else
        {

          $_estado=$liquidacionOK[0]['estadoSolicitud'];
          $_nombre= $liquidacionOK[0]['nombre'].", ".$liquidacionOK[0]['apellido'];
          $_comercial=$liquidacionOK[0]['vendedor'];
          
          $_supervisor=$liquidacionOK[0]['supervisor'];
          $_gerente=$liquidacionOK[0]['gerente'];
          
          $_aporte=$liquidacionOK[0]['AporteMensual'];
          $_motivo=$liquidacionOK[0]['motivoCancelacion'];

          $_fisico=$liquidacionOK[0]['fisico'];
          $_liquidaciones=$liquidacionOK[0]['liquidaciones'];
          $_preauditoria=$liquidacionOK[0]['preauditoria'];
          $_postauditoria=$liquidacionOK[0]['postauditoria'];
          $_finalesgrupofamiliar=$liquidacionOK[0]['finalesgrupofamiliar'];
          $_certificacionauditoria=$liquidacionOK[0]['certificacionauditoria'];
          $_certificacion=$liquidacionOK[0]['certificacion'];
          $_final=$liquidacionOK[0]['final'];
          
          $_style="style='background-color:#f7ce00;  text-align: center; '" ;
          
          if (($_estado == 'CANCELADA') || ($_estado == 'RECHAZADA EN CONTROL FISICO') || ($_estado == 'RECHAZADA EN CONTROL FINAL'))
            {$_style="style='background-color:red;  text-align: center; '";}
    
          if ($_estado == 'FINALIZADA') {$_style="style='background-color:green;  text-align: center; '" ;}
    
         echo "<h3 $_style >$_estado</h3> "; 

        if (  ($_estado == 'CANCELADA') || 
              ($_estado == 'RECHAZADA EN CONTROL FISICO')  || 
              ($_estado == 'RECHAZADA EN CONTROL FINAL') 
            ) 
              {                
?>
                <button onclick="myFunction('Demo20')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Motivo </button>
                <div id="Demo20" class="w3-hide w3-container">
                <p><?php echo $_motivo; ?></p>
                </div>

<?php
                }
?>
                <button onclick="myFunction('Demo21')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Nombre </button>
                <div id="Demo21" class="w3-hide w3-container">
                <p><?php echo $_nombre; ?></p>
                </div>

                <button onclick="myFunction('Demo22')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Comercial </button>
                <div id="Demo22" class="w3-hide w3-container">
                <p><?php echo $_comercial; ?></p>
                </div>

<?php
  
  $_numero=$_GET["vndr"]; // numero de vendedor

  $pos  =strpos($_comercial, $_numero); // si es vendeddor 
  $poSup=strpos($_supervisor, $_numero); // si es supervisor
  $poGer=strpos($_gerente, $_numero); // si es gerente


  if ($_numero=='123' ) //para testear
  {
//    echo "---$pos   <br>";
//    echo "---$poSup <br>";
//    echo "---$poGer         <br>";
        //echo "<br>---> *$_certificacionauditoria;---> $_tx_certificacionauditoria ---- tipo:".gettype($$_certificacionauditoria)." <br> ";

    //echo "<br> Es comercial --> $pos ";
    //echo "<br> Es Supervisor --> $poSup ";
    //echo "<br> Es Gerente --> $poGer ";  
    
/*
botto --> CLAUDIO DANIEL (40521) S BOTTO
ROSA  --> FERNANDO S (40409) ROSA
DAELLO--> YANINA (40006) DAELLO
OTERO --> GERMAN (40000) OTERO
VIAÑO --> LUCIANA (40402) S VIAÑO
*/

    if(!empty($poGer)){echo "<br>es gerente";}else{echo "<br>no es gerente";}
    if(!empty($poSup)){echo "<br>es supervi";}else{echo "<br>no es supervi";}
    if(!empty($pos))  {echo "<br>es comerci";}else{echo "<br>no es comerci";}



} // para pruebas de lagonegro
        
        //if($_numero=='40000')
        //{
        //}




















if ($_numero=='40000' ) //excepcion para que german ottero pueda ver las gerencias de estos otros gerentes
{
  //gotero542

          $_botto ="40521";
          $_rosa  ="40409"; //FERNANDO (40409) ROSA
          $_daello="40006";
          $_viano ="40402";
          $_otero ="40000";

          $_es_botto =strpos($_gerente,$_botto);
          $_es_rosa  =strpos($_gerente,$_rosa);
          $_es_daello=strpos($_gerente,$_daello);
          $_es_viano =strpos($_gerente,$_viano);    
          $_es_oteri =strpos($_gerente,$_otero); 

          if (!empty($_es_botto) ||  !empty($_es_rosa)  ||  !empty($_es_daello) ||  !empty($_es_viano) ||  !empty($_es_oteri))
          {
            $pos='japish';
          }
          else
          {       
                  $_es_botto =strpos($_supervisor,$_botto);
                  $_es_rosa  =strpos($_supervisor,$_rosa);
                  $_es_daello=strpos($_supervisor,$_daello);
                  $_es_viano =strpos($_supervisor,$_viano);    
                  $_es_oteri =strpos($_supervisor,$_otero); 
                  if (!empty($_es_botto) ||  !empty($_es_rosa)  ||  !empty($_es_daello) ||  !empty($_es_viano) ||  !empty($_es_oteri))
                  {
                    $pos='japish';
                  }
                  else
                  {

                    $_es_botto =strpos($_comercial,$_botto);
                    $_es_rosa  =strpos($_comercial,$_rosa);
                    $_es_daello=strpos($_comercial,$_daello);
                    $_es_viano =strpos($_comercial,$_viano);    
                    $_es_oteri =strpos($_comercial,$_otero); 
                    if (!empty($_es_botto) ||  !empty($_es_rosa)  ||  !empty($_es_daello) ||  !empty($_es_viano) ||  !empty($_es_oteri))
                    {
                      $pos='japish';
                    }

                  }
          }
}























          $_tx_fisico="NO";
          $_tx_liquidaciones="NO";
          $_tx_preauditoria="NO";
          $_tx_postauditoria="NO";
          $_tx_finalesgrupofamiliar="NO";
          $_tx_certificacionauditoria="NO";
          $_tx_certificacion="NO";
          $_tx_final="NO";

        

        if($_fisico=="1"){$_tx_fisico="SI";};
        if($_liquidaciones=="1"){$_tx_liquidaciones='SI';};
        if($_preauditoria=="1"){$_tx_preauditoria='SI';};
        if($_postauditoria=="1"){$_tx_postauditoria='SI';};
        if($_finalesgrupofamiliar=="1"){$_tx_finalesgrupofamiliar='SI';};
        if($_certificacionauditoria=="1"){$_tx_certificacionauditoria='SI';};
        if($_certificacion=="1"){$_tx_certificacion='SI';};
        if($_final=="1"){$_tx_final='SI';};

?>
<h5 style='background-color:#82CACD;  text-align: center;'> Ruta de la ficha </h5>

<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Control Fisico <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_fisico"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Control Liquidacion <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_liquidaciones"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Control Pre Auditoria <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_preauditoria"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Control Post Auditoria <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_postauditoria"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Grupo Familiar <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_finalesgrupofamiliar"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Certificacion Auditoria <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_certificacionauditoria"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Certificacion <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_certificacion"; ?></label>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Revision Final <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_tx_final"; ?></label>


<?php
  if ( (($_estado == 'FINALIZADA') || ($_estado == 'ABIERTA')) && ($pos !== false || $poGer !== false  || $poSup !== false) ){
?>
<label class="w3-button w3-block w3-theme-l1 w3-left-align"> Aporte <i class="fa fa-angle-double-right fa-fw w3-margin-right"></i><?php echo "$_aporte"; ?></label>
<?php
}



}
}
}
catch(Exception $e )
{
    echo "error";
}
?>