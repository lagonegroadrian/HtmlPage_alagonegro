<?php

class Perfil {
	private $db;
	public function __construct($base){$this->db = $base;}
	public function __destruct() {	$this->db = null;	}

	public function insertPerfil($_nombre,$_feini,$_fefin)
	{	$respuesta = $this->db->enviarQuery("insert into Perfil_tr values (null, '$_nombre' , '$_feini' , '$_fefin' );");
		if (!$respuesta){echo $this->db->error; return false;}else{return $respuesta;	}
	}


	public function getPerfils()
	{	$respuesta = $this->db->enviarQuery("select id_pe , txt_pe from perfil_pe where act_pe = 1");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}else{if (!$respuesta){return false;}else {return $respuesta;}}
	}





	public function getPerfils2($_cod)
	{	$respuesta = $this->db->enviarQuery("select  id_pe,txt_pe from perfil_pe where act_pe = 1 and id_pe = $_cod ;");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}else{if (!$respuesta){return false;}else {return $respuesta;}}

	}





	public function getPerfilsDisponible($_user)

	{	$respuesta = $this->db->enviarQuery("select * from Perfil_tr tr inner join pregunta_pr pr on tr.id_tr = pr.id_Perfil_pr where pr.id_pr not in (select ask_re from  respuesta_re where usuario_re = $_user) and  CURRENT_DATE BETWEEN  vig_ini_tr and vig_fin_tr LIMIT 1");

		if (!$respuesta and $this->db->error!=''){echo $this->db->error;return false;}else{if (!$respuesta){	return false;}	else {	return $respuesta;}}

	}









	public function getPerfil($codigo)

	{	$respuesta = $this->db->enviarQuery("select * from Perfils where codigo = $codigo");

		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}

		else{if (!$respuesta){return false;	}else {	return $respuesta;	}	}

	}

	

	public function updatePerfil($idPerfil,$nombre,$descripcion,$precio)

	{	$respuesta = $this->db->enviarQuery("UPDATE Perfils SET Perfil = '$nombre',

													descripcion = '$descripcion',

													precio = $precio

											 WHERE codigo = $idPerfil");

				

		if (!$respuesta and $this->db->error!=''){	echo $this->db->error; 	return false;}else{if (!$respuesta){return true;}else {return $respuesta;}	}

	}	

}

?>