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
		
	public function getUsuario($_use,$_pass)
	{
		$Usuario = $this->db->enviarQuery(
			"select id_usuario,usuario_nombre, password, txt_pfl as perfil from usuario usu
			inner join perfil_prf prf on usu.perfil = prf.id_prf 
			where usuario_nombre = '$_use' ");
		//	"select id_usuario , password , perfil from usuario where usuario_nombre = '$_use' "
		
		if (!$Usuario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Usuario){return false;}else{return $Usuario;}}
	}


	public function getUsuarioABM($_use)
	{
		$Usuario = $this->db->enviarQuery(
			"select id_usuario,usuario_nombre, txt_pfl as perfil from usuario usu
			inner join perfil_prf prf on usu.perfil = prf.id_prf 
			where id_usuario = $_use ");
		//	"select id_usuario , password , perfil from usuario where usuario_nombre = '$_use' "
		
		if (!$Usuario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Usuario){return false;}else{return $Usuario;}}
	}


	public function getUsuarios()
	{
		$Usuario = $this->db->enviarQuery("select id_usuario,usuario_nombre, password, txt_pfl as perfil from usuario usu
			inner join perfil_prf prf on usu.perfil = prf.id_prf");

		if (!$Usuario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Usuario){return false;}else{return $Usuario;}}
	}


	public function updateUsuario($_id,$_mail,$_pas,$_per)
	{
		$Usuario = $this->db->enviarQuery(
			"update usuario
			SET usuario_nombre = '".$_mail."'
			   ,password = '".$_pas."'
			   ,perfil= $_per
			WHERE id_usuario = $_id;"
		);						

		if (!$Usuario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Usuario){return true;}else {return $Usuario;}}
	}
	
	public function deleteUsuario($idUsuario)
	{
		$Usuario = $this->db->enviarQuery("DELETE FROM Usuarios WHERE codigo = $idUsuario");	
		if (!$Usuario and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $Usuario;}
	}	
}
?>