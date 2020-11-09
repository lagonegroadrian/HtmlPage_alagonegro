<?php
class CategoriaCascada
{
    
	private $db;
    
	public function __construct($base){$this->db = $base;}
	public function __destruct(){$this->db = null;}
    
    public function getCategoria()
	{
		$Categorias = $this->db->enviarQuery("select id_categoria,detalle_cat
  			 from categoria
             where activo = true");
		if (!$Categorias and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categorias){return false;}else{return $Categorias;}}
	}
    
	public function getSubCategoria($categoria)
	{
		$SubCategoria = $this->db->enviarQuery("select id_subcat, detalle_subcat 
			from subcat where id_categoria = $categoria and activo = 1");
		if (!$SubCategoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$SubCategoria){return false;}else{return $SubCategoria;}}
	}
    
    public function getCategoriaProducto($subcategoria)
	{
		$CategoriaProducto = $this->db->enviarQuery("select id_catprod, titulo_catprod 
			from categoria_producto where id_subcat = $subcategoria and activo = 1");
		if (!$CategoriaProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$CategoriaProducto){return false;}else{return $CategoriaProducto;}}
	}
    
}
?>