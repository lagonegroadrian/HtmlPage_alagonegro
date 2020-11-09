<?php
class Usuario {
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct() {	$this->db = null;}

	public function insertUsuario($nrodoc_vnddor,$name_vnddor,$apellido_vnddor,$user_vnddor,$senha_vnddor,$tipouser_vnddor,$nac_vnddor,$_avatar){
		$Usuario = $this->db->enviarQuery("insert into vendedor values ( $nrodoc_vnddor,'$name_vnddor','$apellido_vnddor','$user_vnddor',  '$senha_vnddor' , '$tipouser_vnddor' ,'$nac_vnddor', CURRENT_TIMESTAMP,'$_avatar')");
		if (!$Usuario){echo $this->db->error; return false;}
		else{return $Usuario;}
	}
	
	
	public function getUser($_user , $_pass){
		$Usuario = $this->db->enviarQuery("select nrodoc_vnddor, user_vnddor, senha_vnddor,name_vnddor, apellido_vnddor,   tipouser_vnddor, nac_vnddor ,avatar from vendedor where user_vnddor = '$_user' ");
	    echo " <br> ---> select nrodoc_vnddor, user_vnddor, senha_vnddor,name_vnddor, apellido_vnddor,   tipouser_vnddor, nac_vnddor ,avatar from vendedor where user_vnddor = '$_user' ";
	    if (!$Usuario and $this->db->error!='')
	    {echo $this->db->error; return false;}else {if (!$Usuario){return false;}else{return $Usuario;}}

		}

	public function existeUser($_user,$_dni){
		return $this->db->enviarQuery("select count(*) as cant from vendedor where user_vnddor = '$_user' or nrodoc_vnddor = $_dni ");
		if (!$Usuario and $this->db->error!='')		{	echo $this->db->error; return false;}
								else {if (!$Usuario){return false;}else{return $Usuario;}}
	}

	public function listaUser()
		{
		$Usuario = $this->db->enviarQuery("select nrodoc_vnddor,name_vnddor,apellido_vnddor,user_vnddor, pe.id_pe as id_pe, pe.txt_pe as txt_pe, creado_vnddor , avatar	FROM vendedor ve join perfil_pe   pe on pe.id_pe = ve.tipouser_vnddor	ORDER by 6 desc");
		if (!$Usuario and $this->db->error!='')
			{	echo $this->db->error; return false;}else{if (!$Usuario){return false;}else{return $Usuario;}}
		}



	public function updateUsuario($nrodoc_vnddor,$nombre,$apellido_vnddor,
		$user_vnddor,$senha_vnddor,$tipouser_vnddor,$nac_vnddor,$avatar_vnddor)
	{
		$Usuario = $this->db->enviarQuery("update vendedor set 
			name_vnddor = '".$nombre."', 
			apellido_vnddor = '".$apellido_vnddor."', 
			user_vnddor = '".$user_vnddor."', 
			senha_vnddor = '".$senha_vnddor."', 
			tipouser_vnddor = '".$tipouser_vnddor."', 
			avatar          = '".$avatar_vnddor."', 
			creado_vnddor = CURRENT_TIMESTAMP
			WHERE nrodoc_vnddor = $nrodoc_vnddor ");
		if (!$Usuario and $this->db->error!=''){echo $this->db->error; 	return false;		}
							else{if (!$Usuario){return true;}else{return $Usuario;}	}
	}




	
	public function deleteUsuario($idUsuario){		
		$Usuario = $this->db->enviarQuery("DELETE FROM Usuarios WHERE codigo = $idUsuario");	
		if (!$Usuario and $this->db->error!='')	{echo $this->db->error; return false;}
											else{return $Usuario;}}
	
}
?>