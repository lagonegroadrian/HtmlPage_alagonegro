<?php
session_start();
$id_tri=$_GET['tr'];
 
?>

 <div class="w3-card w3-round w3-white w3-center">

        <div class="w3-container">


          <p>Documentacion</p>


          

          <img src="w3images/documentacion.png" alt="Avatar" style="width:50%"><br>


        <span>
<?php
        if (file_exists("trivia/docs/".$id_tri."/doc_$id_tri.pdf"))
          {echo "Leer!";}else{ echo "<strike> documento cargado! </strike>";}
?>          
        </span>

          <div class="w3-row w3-opacity">          
              
<?php               
if (file_exists("trivia/docs/".$id_tri."/doc_$id_tri.pdf"))
{
                echo "<a href='trivia/docs/".$id_tri."/doc_$id_tri.pdf' target='_blank' style='text-decoration:none;color:black;' >";
}
?>
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-download"></i> Download</button>
<?php
        if (file_exists("trivia/docs/".$id_tri."/doc_$id_tri.pdf")){echo "</a>";}
?>
          </div>

        </div>

      </div>

      <br>
