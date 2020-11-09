<!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding" id="caja">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

              <form action="funk/validar_trivia.php" method="POST" enctype="multipart/form-data">>
              <h3 class="w3-opacity">Alta de Trivia</h3>
              
              <!--p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p-->

              <input type="text" name="nombre" placeholder="Nombre Trivia" class="w3-border w3-padding" required>
              <br> <br>
              <input type="date" name="fechainicio" placeholder="fecha inicio" class="w3-border w3-padding" required>
              <br> <br>
              <input type="date" name="fechafin" placeholder="fecha fin" class="w3-border w3-padding" required>
              <br> <br>



              <!-- imagen 1 -->
              <div class="form-group">
              <input type="file" class="w3-button w3-theme" name="imag1" id="imag1" aria-describedby="fileHelpId">
              <br>
              <small id="fileHelpId" class="form-text text-muted">El formato de la imagen debe ser <b>PNG</b></small>
              </div>
              <br>

              
              <label for="perfil"><b>Quienes lo pueden hacer </b></label>
              <br>

              <input type="" name="perfil" value="com"> Comercial<br>
              <input type="radio" name="perfil" value="ger"> Gerente<br>
              <input type="radio" name="perfil" value="cap"> Capacitador<br>
              <input type="radio" name="perfil" value="adm"> Adminitrador<br>
              <br>

              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Crear </button> 
            </form>

            </div>
          </div>
        </div>
      </div>
      
      
      
     

      
      
    <!-- End Middle Column -->