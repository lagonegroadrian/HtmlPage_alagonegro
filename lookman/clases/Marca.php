<?php
class Marca
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertMarca($nom)
	{
		$Marca = $this->db->enviarQuery("insert into marca_producto values(null, '".$nom."', 1) ");
		if (!$Marca){echo $this->db->error; return false;}else{return $Marca;}
	}
	
	
	public function getMarca($_act)
	{
		$Marca = $this->db->enviarQuery("select id_marca, descripcion ,activo from marca_producto where activo in ($_act)");

		if (!$Marca and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Marca){return false;}else{return $Marca;}}
	}
	


	public function getMarcaz($_act)
	{
		$Marca = $this->db->enviarQuery("select id_marca, descripcion ,activo from marca_producto where activo in ($_act)");		
		if (!$Marca and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Marca){return false;}else{return $Marca;}}
	}


	public function getxMarca($_cat)
	{
		$Marca = $this->db->enviarQuery("select id_marca, descripcion ,activo from marca_producto where id_Marca = $_cat");
		if (!$Marca and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Marca){return false;}else{return $Marca;}}
	}


	public function updateMarca($_id,$_des,$_estado)
	{
		$Marca = $this->db->enviarQuery("update marca_producto set descripcion = '".$_des."' , activo = $_estado 
			where id_marca = $_id ");
		if (!$Marca and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Marca){return true;}else {return $Marca;}}
	}
	
	public function deleteMarca($idMarca)
	{
		$Marca = $this->db->enviarQuery("DELETE FROM Marcas WHERE codigo = $idMarca");	
		if (!$Marca and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $Marca;}
	}	
}
?>