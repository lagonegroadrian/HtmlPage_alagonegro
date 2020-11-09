<?php
class Liquidacion {
	private $db;
	
	public function __construct($base){
		$this->db = $base;
	}

	public function __destruct() {
		$this->db = null;
	}

	public function insertLiquidacion(){
		$Liquidacion = $this->db->enviarQuery("");

		if (!$Liquidacion){echo $this->db->error; return false;}
		else{return $Liquidacion;}
	}
	
	
	public function getLiquidacion($_dni)
		{$Liquidacion = $this->db->enviarQuery("select estadoSolicitud,nombre,apellido,ultimaModificacion,motivoCancelacion,vendedor,AporteMensual 
			FROM liquidacion where numeroDocumento = $_dni limit 1");
		if (!$Liquidacion and $this->db->error!='')
		{
			//echo $this->db->error; 
			return false;
		}
		else
		{
			if (!$Liquidacion){
				return false;
			}
			else {
				return $Liquidacion;
			}
		}
		}

	
	public function updateLiquidacion($idLiquidacion,$nombre,$descripcion,$precio){		
		$Liquidacion = $this->db->enviarQuery("UPDATE Liquidacions SET Liquidacion = '$nombre',
													descripcion = '$descripcion',
													precio = $precio
											 WHERE codigo = $idLiquidacion");
				
		if (!$Liquidacion and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$Liquidacion){
				return true;
			}
			else {
				return $Liquidacion;
			}
		}
	}
	
	public function deleteLiquidacion($idLiquidacion){		
		$Liquidacion = $this->db->enviarQuery("DELETE FROM Liquidacions WHERE codigo = $idLiquidacion");	
		
		if (!$Liquidacion and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			return $Liquidacion;
		}
	}
	
}
?>