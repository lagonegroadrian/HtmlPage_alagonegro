<?php
class Categoria
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertCategoria($nom_cat)
	{
		$Categoria = $this->db->enviarQuery("insert into categoria values(null, '".$nom_cat."', 1) ");
		if (!$Categoria){echo $this->db->error; return false;}else{return $Categoria;}
	}
	
	
	public function getCategoria($_act)
	{
		/*$Categoria = $this->db->enviarQuery("select id_categoria, detalle_cat ,activo from categoria where id_categoria in (select id_categoria from subcat where id_subcat in (select  id_subcat from categoria_producto where id_catprod in 
			(
			select  distinct(catprod) from producto
			))) and activo in ($_act)");		*/
			
			$Categoria = $this->db->enviarQuery("select id_categoria, detalle_cat ,activo from categoria where id_categoria in (select id_categoria from subcat where id_subcat in (select  id_subcat from categoria_producto where id_catprod in 
			(
			select  distinct(catprod) from producto
			inner join marca_producto on marca_producto.id_marca=producto.marca_producto
			where marca_producto.activo = 1
			))) and activo in ($_act)");		
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}
	


	public function getCategoriaz($_act)
	{
		$Categoria = $this->db->enviarQuery("select id_categoria, detalle_cat ,activo from categoria where activo in ($_act)");		
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}


	public function getxCategoria($_cat)
	{
		$Categoria = $this->db->enviarQuery("select id_categoria, detalle_cat ,activo from categoria where id_categoria = $_cat");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}


	public function updateCategoria($_id_cat,$_det_cat,$_estado)
	{
		$Categoria = $this->db->enviarQuery("update categoria set detalle_cat = '".$_det_cat."' , activo = $_estado where id_categoria = 
			$_id_cat");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return true;}else {return $Categoria;}}
	}
	
	public function deleteCategoria($idCategoria)
	{
		$Categoria = $this->db->enviarQuery("DELETE FROM Categorias WHERE codigo = $idCategoria");	
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $Categoria;}
	}	
}
?>