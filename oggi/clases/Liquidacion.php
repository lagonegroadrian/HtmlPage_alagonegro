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
		{
			/*$Liquidacion = $this->db->enviarQuery("select estadoSolicitud,nombre,apellido,ultimaModificacion,motivoCancelacion,vendedor,AporteMensual,supervisor,gerente			FROM liquidacion where numeroDocumento = $_dni   order by nroSolicitud desc   limit 1");*/
			$Liquidacion = $this->db->enviarQuery("select estadoSolicitud, nombre,  apellido, ultimaModificacion, motivoCancelacion, vendedor, AporteMensual,supervisor,gerente,fisico,liquidaciones,preauditoria,postauditoria,finalesgrupofamiliar,certificacionauditoria,certificacion,final
					FROM liquidacion inner join estados_liquidacion  on nroSolicitud = solicitud where numeroDocumento = $_dni order by nroSolicitud desc   limit 1	");

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





		public function getCantidades($_quien)
		{
		$Liquidacion = $this->db->enviarQuery("select 
		COUNT(nroSolicitud) as cant,
		gerente,
		SUBSTRING(fechaCarga, 7, 4) AS anho,
		SUBSTRING(fechaCarga, 4, 2) AS mes,
		CONCAT(SUBSTRING(fechaCarga, 7, 4), SUBSTRING(fechaCarga, 4, 2) ) AS anho_mes,
		estadoSolicitud
		FROM liquidacion
		where 
		(  gerente 		like '%".$_quien."%'
		or supervisor  	like '%".$_quien."%'
		or vendedor 	like '%".$_quien."%')
		GROUP BY CONCAT(SUBSTRING(fechaCarga, 7, 4), SUBSTRING(fechaCarga, 4, 2) ) , estadoSolicitud
		HAVING COUNT(nroSolicitud) > 0  
		ORDER BY 4 DESC LIMIT 13");
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