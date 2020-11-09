    <div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              

              <!--form action="liq.php" method="POST"-->
              <h6 class="w3-opacity">Consulta el estado de fichas</h6>
              
              <!--p contenteditable="true" type="number" class="w3-border w3-padding" id="dni" id="dni"></p-->
              <!--input type="number" class="w3-border w3-padding" id="dni" id="dni"-->
              <!--button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Consultar </button-->
              <input type="number"  id="dni" name="dni" placeholder="DNI" class="w3-border w3-padding"  maxlength="10" required>

              <?php $nro_vn = $_SESSION['nrodoc_vnddor']; ?>

              <input type="hidden"  id="nro_com" name="nro_com" 
              
              <?php                 echo "value='$nro_vn'";               ?>

              class="w3-border w3-padding" >


              <br>
              <br>
              <button class="w3-button w3-theme" onclick="agregar()"><i class="fa fa-pencil"></i> Consultar </button>

              <!--/form-->

            </div>
          </div>
      </div>
    </div>
<br>


<div class="w3-row-padding" id="caja">
      <div class="w3-col m12">
          <div class="w3-card w3-round w3-white" id="respuesta" name="respuesta">
            <!--div id="respuesta" name="respuesta">            </div-->
          </div>
      </div>
</div>