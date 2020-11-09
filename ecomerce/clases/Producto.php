<?php
class Producto
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertCategoria($nom_cat)
	{
		$Categoria = $this->db->enviarQuery("insert into categoria values(null, '".$nom_cat."', 1) ");
		if (!$Categoria){echo $this->db->error; return false;}else{return $Categoria;}
	}
	

		/*public function getCategoriaz($_act){Categoria = $this->db->enviarQuery("select 
		id_categoria, detalle_cat ,activo from categoria where activo in ($_act)");		
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}	}*/


	public function getProductoDetalle($_producto, $_estado)
	{
		$Categoria = $this->db->enviarQuery("select
				id_prod,
				titulo_prod,
				descripcion_prod,
				detalle_prod,
				precio_prod,
				id_subc,
				estado_prod
				FROM producto_prod
				WHERE id_prod = $_producto
				and estado_prod in ($_estado)");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}


	public function getProducto($_agrupador)
	{
		$Categoria = $this->db->enviarQuery("select
				prod.id_prod as id_prod ,
				prod.titulo_prod as titulo_prod,
				prod.descripcion_prod as descripcion_prod,
				prod.detalle_prod as detalle_prod,
				prod.precio_prod as precio_prod,
				prod.id_subc as id_subc,
				prod.estado_prod as estado_prod,
				subc.texto_subc as texto_subc,
                asub.texto_asub as texto_asub
  		FROM 	producto_prod prod
 		INNER 	join subcategoria_subc subc	on subc.id_subc = prod.id_subc
 		INNER 	join agrupasubc_asub asub 	on asub.id_asub = subc.id_asub
 		INNER 	join categoria_cate cate 	on cate.id_cate = asub.id_cate
 		where 	prod.estado_prod = 1
   		and		subc.id_subc = $_agrupador
		and 	cate.estado_cate=1
   		and 	asub.estado_asub=1
   		and 	subc.estado_subc=1
   		and 	prod.estado_prod=1");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}



	public function getCategoria()
	{
		$Categoria = $this->db->enviarQuery("select DISTINCT(cate.id_cate) as id_cate,cate.texto_cate
  		FROM 	producto_prod prod
		INNER 	join subcategoria_subc subc	on subc.id_subc = prod.id_subc
		INNER 	join agrupasubc_asub asub 	on asub.id_asub = subc.id_asub
		INNER 	join categoria_cate cate 	on cate.id_cate = asub.id_cate
		Where 	prod.estado_prod = 1
		and 	cate.estado_cate=1
		and 	asub.estado_asub=1
		and 	subc.estado_subc=1
		and 	prod.estado_prod=1");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}




	public function getAgrupadorSubCategoria($_categoria)
	{
		$Categoria = $this->db->enviarQuery("select DISTINCT(asub.id_asub) as id_asub,asub.texto_asub
		 FROM 	producto_prod prod
		 INNER 	join subcategoria_subc subc	on subc.id_subc = prod.id_subc
		 INNER 	join agrupasubc_asub asub 	on asub.id_asub = subc.id_asub
		 INNER 	join categoria_cate cate 	on cate.id_cate = asub.id_cate
		 where 	prod.estado_prod = 1
		 and 	cate.id_cate = $_categoria
		 and 	cate.estado_cate=1
		 and 	asub.estado_asub=1
		 and 	subc.estado_subc=1
		 and 	prod.estado_prod=1");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}
	


	public function getSubCategoria($_agrupador)
	{
		$Categoria = $this->db->enviarQuery("select DISTINCT(subc.id_subc) as id_subc,
        subc.texto_subc as texto_subc
  		FROM 	producto_prod prod
 		INNER 	join subcategoria_subc subc	on subc.id_subc = prod.id_subc
 		INNER 	join agrupasubc_asub asub 	on asub.id_asub = subc.id_asub
 		INNER 	join categoria_cate cate 	on cate.id_cate = asub.id_cate
 		where 	prod.estado_prod = 1
   		and		subc.id_asub = $_agrupador
		and 	cate.estado_cate=1
   		and 	asub.estado_asub=1
   		and 	subc.estado_subc=1
   		and 	prod.estado_prod=1");
		if (!$Categoria and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Categoria){return false;}else{return $Categoria;}}
	}

	
	
}
?>