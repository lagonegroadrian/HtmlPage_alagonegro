<?php
class Respuesta {
	private $db;
	
	public function __construct($base){
		$this->db = $base;
	}

	public function __destruct() {
		$this->db = null;
	}

	public function insertRespuesta($_opcion,$_usuario,$_trivia,$_id_ask){
		$respuesta = $this->db->enviarQuery("insert into respuesta_re values 
			(null, $_opcion, $_usuario,$_trivia , null, $_id_ask) ");
		
		if (!$respuesta){
			echo $this->db->error; 
			return false;
		}
		else{
			return $respuesta;
		}
	}
	
	
	public function getCantRtas($_tivia , $_user)
		{
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select 
			(SELECT count(*) FROM pregunta_pr where id_trivia_pr = $_tivia) as cantPreguntas,
			COUNT(*) as cantResCorrectas
			 from respuesta_re where usuario_re = $_user and trivia_re = $_tivia
			  and opcion_re in (SELECT id_op FROM opcion_op where correcto_op is true)");
		
		if (!$respuesta and $this->db->error!='')
			{
				echo $this->db->error; 
				return false;
			}
			else
			{
				if (!$respuesta){return false;}else {return $respuesta;}
			}
		}

















	public function getRtasXuser($_tivia)
		{
		$respuesta = $this->db->enviarQuery("select trivia_re as id_trivia, usuario_re as id_user, tipouser_vnddor,ve.user_vnddor as usuario, pe.txt_pe as perfil , fecha_re as fecha_respuesta, id_op as id_respuesta, descrip_op as descripcion_respuesta, correcto_op as cod_correcto, IF(correcto_op=1, 'Correcto', IF(correcto_op=0, 'Incorrecto', 'No respondio')) as correcto FROM vendedor ve left join respuesta_re re on re.usuario_re = ve.nrodoc_vnddor left JOIN opcion_op op ON op.id_op = re.opcion_re inner join perfil_pe pe on ve.tipouser_vnddor = pe.id_pe where trivia_re is null or trivia_re = $_tivia");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}else{if (!$respuesta){return false;}else {return $respuesta;}}
		}























	public function getRespuesta($codigo){
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select id_op , descrip_op FROM Respuesta_op where id_pregunta_op = $codigo");
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
	}







	public function listarRespuesta($_idtri){
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select
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
			INNER JOIN vendedor ve on re.usuario_re=ve.nrodoc_vnddor
			where id_trivia_pr = $_idtri
			");

		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
	}

















	public function updateRespuesta($idRespuesta,$nombre,$descripcion,$precio){		
		$respuesta = $this->db->enviarQuery("UPDATE Respuestas SET Respuesta = '$nombre',
													descripcion = '$descripcion',
													precio = $precio
											 WHERE codigo = $idRespuesta");
				
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$respuesta){
				return true;
			}
			else {
				return $respuesta;
			}
		}
	}
	
	public function deleteRespuesta($_trivia,$_usuario){		
		$respuesta = $this->db->enviarQuery("delete 
			from respuesta_re WHERE trivia_re= $_trivia and usuario_re = $_usuario");	
		
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			return $respuesta;
		}
	}
	
}
?>