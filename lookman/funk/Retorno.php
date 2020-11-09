<?php

require_once "Confinexion.php";
Class Retorno extends Conexion
{

	public function Retorno()
	{
		parent::_construct();
	}

	public function get_6productos()
	{
	$resultado=$this->conexion_db->query("
										Select 
										prod.id_producto,titulo,descripcion,precio,puntaje,orden,imagen_filesystem
										FROM producto prod
										inner join imagen_producto imgprod
										on prod.id_producto = imgprod.id_producto
										order by prod.id_producto,puntaje , orden asc
										LIMIT 12
										");

	$productos=$resultado->fetch_all(MYSQLI_ASSOC);
	return $productos;
	}

}

?>