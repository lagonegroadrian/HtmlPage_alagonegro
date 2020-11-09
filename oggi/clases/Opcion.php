<?php
class Opcion {
	private $db;
	
	public function __construct($base){
		$this->db = $base;
	}

	public function __destruct() {
		$this->db = null;
	}



	public function insertOpcion($id_pregunta_op,$descrip_op,$correcto_op){
		$respuesta = $this->db->enviarQuery("insert into opcion_op values (null,  $id_pregunta_op, '$descrip_op', $correcto_op) ");		
		
		if (!$respuesta){
			echo $this->db->error; 
			return false;
		}
		else{
			return $respuesta;
		}
	}
	
	
	public function getOpcions()
		{
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select id_tr from Opcion_tr where CURRENT_DATE BETWEEN  vig_ini_tr and vig_fin_tr");
		if (!$respuesta and $this->db->error!='')
		{
			echo $this->db->error; 
			return false;
		}
		else
		{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
		}

	public function getOpcion($codigo){
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select id_op , descrip_op FROM opcion_op where id_pregunta_op = $codigo");
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
	
	public function updateOpcion($idOpcion,$nombre,$descripcion,$precio){		
		$respuesta = $this->db->enviarQuery("UPDATE Opcions SET Opcion = '$nombre',
													descripcion = '$descripcion',
													precio = $precio
											 WHERE codigo = $idOpcion");
				
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
	
	public function deleteOpcion($idOpcion){		
		$respuesta = $this->db->enviarQuery("DELETE FROM Opcions WHERE codigo = $idOpcion");	
		
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