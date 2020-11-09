<?php
class CategoriaProducto
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertCategoriaProducto($titu,$cate,$subcat)
	{
		$CategoriaProducto = $this->db->enviarQuery("insert into categoria_producto values(null, '".$titu."', $cate, $subcat, 1)");
		if (!$CategoriaProducto){echo $this->db->error; return false;}else{return $CategoriaProducto;}
	}
    
    public function getCategoria()
	{
		$Categorias = $this->db->enviarQuery("select id_categoria,detalle_cat
  			 from categoria
             where activo = true");
		if (!$Categorias and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categorias){return false;}else{return $Categorias;}}
	}
        
	public function getCategoriaProducto($_cod)
	{
		$CategoriaProducto = $this->db->enviarQuery("select id_catprod, titulo_catprod 
			from categoria_producto where id_subcat = $_cod and id_catprod in (select  distinct(catprod) from producto) and activo = 1");
		if (!$CategoriaProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$CategoriaProducto){return false;}else{return $CategoriaProducto;}}
	}


	public function getCategoriaProductoz($_act)
	{
		$CategoriaProducto = $this->db->enviarQuery("select 
			cat_pr.id_catprod as id_catprod,
			cat_pr.titulo_catprod as titulo_catprod,
			cat_pr.activo as activo,
			cat_pr.id_categoria as id_categoria,
			categor.detalle_cat as detalle_cat,
			cat_pr.id_subcat as id_subcat,
			sub_cat.detalle_subcat as detalle_subcat
			from categoria_producto cat_pr
			inner join subcat sub_cat on sub_cat.id_subcat = cat_pr.id_subcat
			inner join categoria categor on categor.id_categoria=cat_pr.id_categoria
			where cat_pr.activo in ($_act)");

		if (!$CategoriaProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$CategoriaProducto){return false;}else{return $CategoriaProducto;}}
	}

	public function updateCategoriaProducto($_titu,$_cat,$_subcat,$_act,$_catpr)
	{
		$CategoriaProducto = $this->db->enviarQuery("update categoria_producto set 
			titulo_catprod= '".$_titu."' ,
			id_categoria = $_cat ,
			id_subcat = $_subcat ,
			activo = $_act
			where id_catprod = $_catpr
			");				


		if (!$CategoriaProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$CategoriaProducto){return true;}else {return $CategoriaProducto;}}
	}
	
	public function deleteCategoriaProducto($idCategoriaProducto)
	{
		$CategoriaProducto = $this->db->enviarQuery("DELETE FROM CategoriaProductos WHERE codigo = $idCategoriaProducto");	
		if (!$CategoriaProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $CategoriaProducto;}
	}	
}
?>