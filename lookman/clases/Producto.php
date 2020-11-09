<?php
class Producto {
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct() {$this->db = null;}

	public function insertProducto($_titulo,$descripcion,$descripcion_detallada,$precio,$marcaprod,$destacado,$catprod)
	{
		$Producto = $this->db->enviarQuery("insert into producto values (null, '$_titulo', '$descripcion' , '$descripcion_detallada' , 
			$precio, $marcaprod, 2, 0 , 1, $destacado, $catprod, null)");

		if (!$Producto){echo $this->db->error; return false;}
		else{return $Producto;}
	}
	
	
	public function getProducto($_limite,$_orden,$_categoria)
		{
		$Producto = $this->db->enviarQuery("select
			      catprod,pro.id_producto,id_imagen,titulo,
			      pro.descripcion as pro_descripcion 
			      ,descripcion_detallada,precio,imagen_filesystem,puntaje,
			      tama.descripcion as tama_descripcion,
			      marca_producto.id_marca as id_marca,
			      marca_producto.descripcion as nom_marca
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto 
	
	inner join marca_producto on marca_producto.id_marca=pro.marca_producto

 			left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in ( $_categoria ) 
	and marca_producto.activo = 1
	and isactivo = 1
 			order by $_orden limit $_limite ");

		
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}	







public function getProductoFiltrao($_limite,$_orden,$_categoria,$_filtro)
		{
		$Producto = $this->db->enviarQuery("select
			      catprod,pro.id_producto,id_imagen,titulo,
			      pro.descripcion as pro_descripcion 
			      ,descripcion_detallada,precio,imagen_filesystem,puntaje,
			      tama.descripcion as tama_descripcion,
			      marca_producto.id_marca as id_marca,
			      marca_producto.descripcion as nom_marca
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto 
	
	inner join marca_producto on marca_producto.id_marca=pro.marca_producto

 			left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in ( $_categoria ) 
	and marca_producto.activo = 1
	and marca_producto.id_marca = $_filtro
 			order by $_orden limit $_limite ");


		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}	












public function getProductoXmarca($_limite,$_orden,$_categoria)
		{
		$Producto = $this->db->enviarQuery("select
			      distinct(marca_producto.id_marca) as id_marca,
			      marca_producto.descripcion as nom_marca
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto 
	
	inner join marca_producto on marca_producto.id_marca=pro.marca_producto

 			left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in ( $_categoria ) 
	and marca_producto.activo = 1
 			order by $_orden limit $_limite ");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}	





public function getProductosXmarca($_limite,$_orden,$_subcat)
		{
		$Producto = $this->db->enviarQuery("select
			      distinct(marca_producto.id_marca) as id_marca,
			      marca_producto.descripcion as nom_marca
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto 
			inner join marca_producto on marca_producto.id_marca=pro.marca_producto
 			 left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in 	(
									select id_catprod
									from categoria_producto
									where id_subcat = $_subcat
								)
	and marca_producto.activo = 1
 			order by $_orden limit $_limite ");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}









	public function getProductos($_limite,$_orden,$_subcat)
		{
		$Producto = $this->db->enviarQuery("select
			      catprod,pro.id_producto,id_imagen,titulo,pro.descripcion as pro_descripcion
			      ,descripcion_detallada,precio,imagen_filesystem,puntaje,
			      tama.descripcion as tama_descripcion
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto 
			inner join marca_producto on marca_producto.id_marca=pro.marca_producto
 			 left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in 	(
									select id_catprod
									from categoria_producto
									where id_subcat = $_subcat
								)
	and marca_producto.activo = 1
 			order by $_orden limit $_limite ");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}











	public function getProductosFiltrao($_limite,$_orden,$_subcat,$_filtro)
		{
		$Producto = $this->db->enviarQuery("select
			      catprod,pro.id_producto,id_imagen,titulo,pro.descripcion as pro_descripcion
			      ,descripcion_detallada,precio,imagen_filesystem,puntaje,
			      tama.descripcion as tama_descripcion
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto 
			inner join marca_producto on marca_producto.id_marca=pro.marca_producto
 			 left join tamanio tama on pro.id_tamanho = tama.id_tamanio
 			where catprod in 	(
									select id_catprod
									from categoria_producto
									where id_subcat = $_subcat
								)
	and marca_producto.activo = 1
	and marca_producto.id_marca = $_filtro
 			order by $_orden limit $_limite ");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}














		public function getProductoDestacado($_limite,$_orden)
		{
		$Producto = $this->db->enviarQuery("select  
			      pro.id_producto,id_imagen,titulo,pro.descripcion,descripcion_detallada,precio,imagen_filesystem,puntaje
  			 from producto pro 
 			inner join imagen_producto img on img.id_producto = pro.id_producto
            inner join marca_producto mp on pro.marca_producto = mp.id_marca
            where mp.activo = true && pro.destacado = true
            order by $_orden limit $_limite");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}



		public function getProd($_prod)
		{
		$Producto = $this->db->enviarQuery("select 
		prod.id_producto as id_producto 
		,titulo
		,prod.descripcion as prod_descripcion
		,descripcion_detallada
		,precio
		,puntaje
		,orden
		,imagen_filesystem
		,tama.descripcion as tama_descripcion
		,mp.descripcion as marca
        ,mp.activo as ismarcaactivo 
		FROM producto prod
		inner join imagen_producto imgprod on prod.id_producto = imgprod.id_producto
		left join tamanio tama on prod.id_tamanho = tama.id_tamanio
		left join marca_producto mp on marca_producto = mp.id_marca
		where prod.id_producto in ($_prod)
		order by prod.id_producto,puntaje , orden asc");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}
	


		public function getProdz($_act)
		{
		$Producto = $this->db->enviarQuery("select 
		 prod.id_producto as id_producto 
		,titulo
		,prod.descripcion as prod_descripcion
		,descripcion_detallada
		,precio
		,prod.marca_producto
		,mp.descripcion as marca
		,prod.id_genero
		,puntaje
		,isactivo
		,destacado
		,catprod
		,titulo_catprod
		,imagen_filesystem
		,tama.descripcion as tama_descripcion
		,catepro.id_subcat as id_subcat
		,catepro.id_catprod as id_catprod
		,catepro.id_categoria as id_categoria
		FROM producto prod
		inner join imagen_producto imgprod on prod.id_producto = imgprod.id_producto
		inner join categoria_producto catepro on id_catprod = catprod
		left join tamanio tama on prod.id_tamanho = tama.id_tamanio
		left join marca_producto mp on marca_producto = mp.id_marca
		where mp.activo=1 and isactivo in ($_act)
		and catepro.activo=1
		order by prod.id_producto,puntaje , orden asc");
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return false;}else {return $Producto;}}
		}
	







public function updateProducto($_id,$_titulo,$descripcion,$descripcion_detallada,$precio,$marcaprod,$destacado,$catprod,$desactivo)
	{
		$Producto = $this->db->enviarQuery("update producto
			set 
			 titulo='$_titulo'
			,descripcion='$descripcion'
			,descripcion_detallada='$descripcion_detallada'
			,precio=$precio
			,marca_producto=$marcaprod
			,id_genero=NULL				
			,isactivo=$desactivo
			,destacado=$destacado
			,catprod=$catprod
			,id_tamanho=NULL	
			where id_producto = $_id
			");

	
		
		if (!$Producto and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Producto){return true;}else {return $Producto;}}

	}





}
?>