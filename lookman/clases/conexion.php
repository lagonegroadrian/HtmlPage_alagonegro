<?php

class conexion {

	private $server;
	private $usuario;
	private $password;
	private $nombre;
	protected $link;

	function __construct($_server,$_usuario,$_password,$_nombre)
	{
		$this->server = $_server;
		$this->usuario = $_usuario;
		$this->password = $_password;
		$this->nombre = $_nombre;
	}


	public function conectar()
	{ 
	define('DB_SERVER', $this->server);
	define('DB_USERNAME', $this->usuario);
	define('DB_PASSWORD', $this->password);
	define('DB_NAME', $this->nombre);	

	$this->setear_link();

	if($this->retornar_link() === false)
	{die("ERROR: En estos momentos no nos podemos conectar a la base de datos :( " . mysqli_connect_error());}	
	}


	public function setear_link()
	{
		$link = mysqli_connect($this->server, $this->usuario, $this->password, $this->nombre);
		$this->link = $link;
	}

	public function retornar_link(){ return $this->link;}

}
?>