<?php
class Usuario
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertUsuario($_mail,$_pass)
	{
		$Usuario = $this->db->enviarQuery("insert into usuario values (null, '".$_mail."', '".$_pass."' , null);");
		if (!$Usuario){echo $this->db->error; return false;}else{return $Usuario;}
	}
		
	public function getUsuario($_user,$_pass)
	{
		$Usuario = $this->db->enviarQuery(
		  "select id_usu, nombre_usu , apellido_usu , usuario_usu , pass_usu
			 FROM usuario_usu
			WHERE estado_usu = 1
			  and usuario_usu = '".$_user."' 
			  and pass_usu = '".$_pass."'  ");
		if (!$Usuario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Usuario){return false;}else{return $Usuario;}}
	}


}
?>