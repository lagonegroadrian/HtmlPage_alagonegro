<?php

require_once "config.php";

class Conexion
{
	protected $conexion_db;

	public function Conexion()
	{
		$this->conexion_db=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

		if($this->conexion_db->connect_error)
		{
			echo "No se pudo conectar a la base de datos".$this->conexion_db->connect_error;
			return;
		}

		$this->conexion_db->set_charset(DB_CHARSET);
	}
}

?>