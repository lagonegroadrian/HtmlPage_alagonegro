<?php
class SubCategoria
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertSubCategoria($_id_cat,$_nom_subcat)
	{
		$SubCategoria = $this->db->enviarQuery("insert into subcat values (null, $_id_cat , '".$_nom_subcat."' ,1)");
		if (!$SubCategoria){echo $this->db->error; return false;}else{return $SubCategoria;}
	}
		
	public function getSubCategoria($_cod)
	{
		$SubCategoria = $this->db->enviarQuery("select id_subcat,detalle_subcat from subcat where id_categoria = $_cod and id_subcat in (select  id_subcat from categoria_producto where id_catprod in (select  distinct(catprod) from producto))");
		if (!$SubCategoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$SubCategoria){return false;}else{return $SubCategoria;}}
	}


	public function getSubCategoriaz($_act)
	{
		$SubCategoria = $this->db->enviarQuery("select sub.id_subcat, sub.id_categoria , cat.detalle_cat , sub.detalle_subcat ,sub.activo 
		from subcat sub
		inner join categoria cat on sub.id_categoria = cat.id_categoria
		where sub.activo in ($_act)");
		if (!$SubCategoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$SubCategoria){return false;}else{return $SubCategoria;}}
	}




	public function getSubCategoriaq($_subcat)
	{
		$SubCategoria = $this->db->enviarQuery("select sub.id_subcat, sub.id_categoria , cat.detalle_cat , sub.detalle_subcat ,sub.activo 
		from subcat sub
		inner join categoria cat on sub.id_categoria = cat.id_categoria
		where sub.id_subcat = $_subcat");
		if (!$SubCategoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$SubCategoria){return false;}else{return $SubCategoria;}}
	}



	public function updateSubCategoria($_cat,$nombre,$_sub_cat,$_act)
	{
		$SubCategoria = $this->db->enviarQuery("update subcat sub 
			set 
			id_categoria = $_cat , 
			detalle_subcat = '".$nombre."' ,
			activo = $_act
			where id_subcat = $_sub_cat");	

		if (!$SubCategoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$SubCategoria){return true;}else {return $SubCategoria;}}
	}
	
	public function deleteSubCategoria($idSubCategoria)
	{
		$SubCategoria = $this->db->enviarQuery("DELETE FROM SubCategorias WHERE codigo = $idSubCategoria");	
		if (!$SubCategoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $SubCategoria;}
	}	
}
?>