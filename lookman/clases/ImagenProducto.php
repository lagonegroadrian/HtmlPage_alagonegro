<?php
class ImagenProducto {
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct() {$this->db = null;}

	public function insertImagenProducto($_idprod, $_titulo)
	{
		$ImagenProducto = $this->db->enviarQuery("insert into imagen_producto values (null, $_idprod, 1, '$_titulo' )");

		if (!$ImagenProducto){echo $this->db->error; return false;}
		else{return $ImagenProducto;}
	}
	
	
	public function getImagenProducto($_limite,$_orden,$_categoria)
		{
		$ImagenProducto = $this->db->enviarQuery("select
			      catprod,pro.id_ImagenProducto,id_imagen,titulo,
			      pro.descripcion as pro_descripcion 
			      ,descripcion_detallada,precio,imagen_filesystem,puntaje,
			      tama.descripcion as tama_descripcion
  			 from ImagenProducto pro 
 			inner join imagen_ImagenProducto img on img.id_ImagenProducto = pro.id_ImagenProducto 
 			left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in ( $_categoria ) 
 			order by $_orden limit $_limite ");
		if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$ImagenProducto){return false;}else {return $ImagenProducto;}}
		}	


	public function getImagenProductos($_limite,$_orden,$_subcat)
		{
		$ImagenProducto = $this->db->enviarQuery("select
			      catprod,pro.id_ImagenProducto,id_imagen,titulo,pro.descripcion as pro_descripcion
			      ,descripcion_detallada,precio,imagen_filesystem,puntaje,
			      tama.descripcion as tama_descripcion
  			 from ImagenProducto pro 
 			inner join imagen_ImagenProducto img on img.id_ImagenProducto = pro.id_ImagenProducto 
 			left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in 	(
									select id_catprod
									from categoria_ImagenProducto
									where id_subcat = $_subcat
								)
 			order by $_orden limit $_limite ");
		if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$ImagenProducto){return false;}else {return $ImagenProducto;}}
		}


		public function getImagenProductoDestacado($_limite,$_orden)
		{
		$ImagenProducto = $this->db->enviarQuery("select  
			      pro.id_ImagenProducto,id_imagen,titulo,descripcion,descripcion_detallada,precio,imagen_filesystem,puntaje
  			 from ImagenProducto pro 
 			inner join imagen_ImagenProducto img on img.id_ImagenProducto = pro.id_ImagenProducto order by $_orden limit $_limite");
		if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$ImagenProducto){return false;}else {return $ImagenProducto;}}
		}



		public function getProd($_prod)
		{
		$ImagenProducto = $this->db->enviarQuery("select 
		prod.id_ImagenProducto as id_ImagenProducto 
		,titulo
		,prod.descripcion as prod_descripcion
		,descripcion_detallada
		,precio
		,puntaje
		,orden
		,imagen_filesystem
		,tama.descripcion as tama_descripcion
		,mp.descripcion as marca
		FROM ImagenProducto prod
		inner join imagen_ImagenProducto imgprod on prod.id_ImagenProducto = imgprod.id_ImagenProducto
		left join tamanio tama on prod.id_tamanho = tama.id_tamanio
		left join marca_ImagenProducto mp on marca_ImagenProducto = mp.id_marca
		where prod.id_ImagenProducto in ($_prod)
		order by prod.id_ImagenProducto,puntaje , orden asc");
		if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$ImagenProducto){return false;}else {return $ImagenProducto;}}
		}
	


		public function getProdz($_act)
		{
		$ImagenProducto = $this->db->enviarQuery("select 
		 prod.id_ImagenProducto as id_ImagenProducto 
		,titulo
		,prod.descripcion as prod_descripcion
		,descripcion_detallada
		,precio
		,prod.marca_ImagenProducto
		,mp.descripcion as marca
		,prod.id_genero
		,puntaje
		,isactivo
		,destacado
		,catprod
		,titulo_catprod
		,imagen_filesystem
		,tama.descripcion as tama_descripcion
		FROM ImagenProducto prod
		inner join imagen_ImagenProducto imgprod on prod.id_ImagenProducto = imgprod.id_ImagenProducto
		inner join categoria_ImagenProducto catepro on id_catprod = catprod
		left join tamanio tama on prod.id_tamanho = tama.id_tamanio
		left join marca_ImagenProducto mp on marca_ImagenProducto = mp.id_marca
		where mp.activo=1 and isactivo in ($_act)
		and catepro.activo=1
		order by prod.id_ImagenProducto,puntaje , orden asc");
		if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$ImagenProducto){return false;}else {return $ImagenProducto;}}
		}
	

	
	public function updateImagenProducto($id_producto,$imagen_filesystem){

		$ImagenProducto = $this->db->enviarQuery("update imagen_producto set imagen_filesystem='$imagen_filesystem' where id_producto = $id_producto");

		echo "<br> update imagen_producto set imagen_filesystem='$imagen_filesystem' where id_producto = $id_producto";
		//if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		//else{if (!$ImagenProducto){return true;}else {return $ImagenProducto;}}
	}
	
	public function deleteImagenProducto($idImagenProducto)
	{
		$ImagenProducto = $this->db->enviarQuery("DELETE FROM ImagenProductos WHERE codigo = $idImagenProducto");	
		
		if (!$ImagenProducto and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $ImagenProducto;}
	}
	
}
?>