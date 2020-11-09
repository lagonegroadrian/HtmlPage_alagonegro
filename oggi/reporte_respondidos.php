<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Trivia (Respuestas).xls');

session_start();

if(!isset($_SESSION['id_pe']))
{    
  echo '<script type="text/javascript">window.location="login.php";</script>';
}

$_id_perfil=$_SESSION['id_pe'];
switch ($_id_perfil) 
{
  case '1':    $_pasa=TRUE;    break;
  case '2':    $_pasa=FALSE;   break;
  case '3':    $_pasa=FALSE;   break;
  case '4':    $_pasa=FALSE;   break;
  case '5':    $_pasa=FALSE;    break;
  case '6':    $_pasa=FALSE;   break;
  case '7':    $_pasa=TRUE;   break;
  default:     $_pasa=FALSE;   break;
}

if ($_pasa == FALSE) {  echo '<script type="text/javascript">window.location="index.php";</script>';}

if (!isset($_SESSION['name_vnddor']))
{  echo '<script type="text/javascript">window.location="login.php";</script>'; } 


$_titulo=$_POST['_texto_tr'];
$_idtri=$_POST['_id_tr'];
$_vig_ini_tr=$_POST['_vig_ini_tr'];
$_vig_fin_tr=$_POST['_vig_fin_tr'];

  	require 'autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$resp = new Respuesta($base);
	$result = $resp->getRtasXuser($_idtri);

?>

<table border="1">
	<tr style="background-color:red;">
		<th>Trivia</th>
		<th>Usuario</th>
		<th>Fecha de Respuestas</th>
		<th>Pregunta</th>
		<th>Descripcion Respuesta</th>
		<th>Correcto</th>
	</tr>

<?php
        for ($aux=0; $aux < count($result); $aux++)
        {
?>
				<tr>
					<td><?php echo $result[$aux]['descripcion_trivia'];	?></td>
					<td><?php echo $result[$aux]['usuario']; ?></td>
					<td><?php echo $result[$aux]['fecha_respuesta']; ?></td>
					<td><?php echo $result[$aux]['descripcion_pregunta']; ?></td>
					<td><?php echo $result[$aux]['descripcion_respuesta']; ?></td>
					<td><?php echo $result[$aux]['correcto']; ?></td>
				</tr>
<?php
		}
?>
</table>