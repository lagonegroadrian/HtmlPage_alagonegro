<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Trivia (Respuestas).xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="select
	trivia_re as id_trivia, 
	texto_tr as descripcion_trivia, 
	vig_ini_tr as inicio_trivia, 
	vig_fin_tr as fin_trivia, 
	usuario_re as id_user, 
	ve.user_vnddor as usuario, 
	fecha_re as fecha_respuesta, 
	id_pr as id_pregunta, 
	descrip_pr as descripcion_pregunta, 
	id_op as id_respuesta, 
	descrip_op as descripcion_respuesta, 
	correcto_op as cod_correcto, 
	IF(correcto_op=1, 'Correcto', 'Incorrecto') as correcto 
	FROM respuesta_re re INNER JOIN opcion_op op ON op.id_op = re.opcion_re 
	INNER JOIN pregunta_pr pr ON pr.id_pr = op.id_pregunta_op 
	INNER JOIN trivia_tr tr on tr.id_tr = re.trivia_re 
	INNER JOIN vendedor ve on re.usuario_re=ve.nrodoc_vnddor";
	$result=mysqli_query($link, $query);
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
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
				<td><?php echo $row['descripcion_trivia']; ?></td>
				<td><?php echo $row['usuario']; ?></td>
				<td><?php echo $row['fecha_respuesta']; ?></td>
				<td><?php echo $row['descripcion_pregunta']; ?></td>
				<td><?php echo $row['descripcion_respuesta']; ?></td>
				<td><?php echo $row['correcto']; ?></td>


				</tr>	

			<?php
		}

	?>
</table>