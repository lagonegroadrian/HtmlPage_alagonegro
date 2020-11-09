<?php
class Pregunta {
	private $db;
	
	public function __construct($base){
		$this->db = $base;
	}

	public function __destruct() {
		$this->db = null;
	}






	public function insertPregunta($_id_trivia_pr,$_descrip_pr)
	{
		$respuesta = $this->db->enviarQuery("insert into pregunta_pr values (null, $_id_trivia_pr, '$_descrip_pr') ");
		if (!$respuesta){echo $this->db->error; return false;}else{return $respuesta;}
	}
	
	
	public function getPreguntasXtrvia(){
		$respuesta = $this->db->enviarQuery("select id_pr, id_tr, concat(texto_tr ,' - ', descrip_pr) as texto from pregunta_pr pr inner JOIN trivia_tr tr on pr.id_trivia_pr = tr.id_tr where CURRENT_DATE BETWEEN vig_ini_tr and vig_fin_tr");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$respuesta){return false;}else {return $respuesta;}}
	}





	public function getPreguntas($_codigo,$_usuario){
		$respuesta = $this->db->enviarQuery("select id_pr ,  descrip_pr from pregunta_pr
			where id_pr not in (select ask_re from respuesta_re where usuario_re = $_usuario)
			  and id_trivia_pr = $_codigo  LIMIT 1");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$respuesta){return false;}else {return $respuesta;}}
	}
	
	public function updatePregunta($idPregunta,$nombre,$descripcion,$precio){		
		$respuesta = $this->db->enviarQuery("UPDATE Preguntas SET Pregunta = '$nombre',
													descripcion = '$descripcion',
													precio = $precio
											 WHERE codigo = $idPregunta");
				
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
	
	public function deletePregunta($idPregunta){		
		$respuesta = $this->db->enviarQuery("delete from preguntas WHERE codigo = $idPregunta");	
		
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