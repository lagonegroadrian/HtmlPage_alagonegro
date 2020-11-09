<?php
class Color {
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct() {$this->db = null;}

	public function insertColor()
	{
		$Color = $this->db->enviarQuery("	select imagen_Color)");

		if (!$Color){echo $this->db->error; return false;}
		else{return $Color;}
	}
	
	
	public function getColor($_prod)
		{
		$Producto = $this->db->enviarQuery("select 
		colo.descripcion
		FROM producto prod
		left join producto_color pcol on pcol.id_prod_prco = prod.id_producto
		left join color colo  on colo.id_color = pcol.id_colo_prco
		where prod.id_producto in ($_prod)");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}

	
	public function updateColor($idColor,$nombre,$descripcion,$precio){		
		$Color = $this->db->enviarQuery("idColor");
		if (!$Color and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Color){return true;}else {return $Color;}}
	}
	
	public function deleteColor($idColor)
	{
		$Color = $this->db->enviarQuery("DELETE FROM Colors WHERE codigo = $idColor");	
		
		if (!$Color and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $Color;}
	}
	
}
?>