<?php

class Trivia {
	private $db;
	public function __construct($base){$this->db = $base;}
	public function __destruct() {	$this->db = null;	}

	public function insertTrivia($_nombre,$_feini,$_fefin,$_perfil)
	{	$respuesta = $this->db->enviarQuery("insert into trivia_tr values (null, '$_nombre' , '$_feini' , '$_fefin' ,'$_perfil');");
		if (!$respuesta){echo $this->db->error; return false;}else{return $respuesta;	}
	}


	public function getTrivias()
	{	$respuesta = $this->db->enviarQuery("select id_tr , texto_tr from trivia_tr where CURRENT_DATE BETWEEN  vig_ini_tr and vig_fin_tr limit 1");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}else{if (!$respuesta){return false;}else {return $respuesta;}}
	}



	public function getallTrivias()
	{	$respuesta = $this->db->enviarQuery("select id_tr , texto_tr , vig_ini_tr, vig_fin_tr from trivia_tr order by vig_fin_tr ");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}else{if (!$respuesta){return false;}else {return $respuesta;}}
	}



	public function getTrivias2()
	{	$respuesta = $this->db->enviarQuery("select id_tr , texto_tr from trivia_tr where CURRENT_DATE BETWEEN  vig_ini_tr and vig_fin_tr ");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}else{if (!$respuesta){return false;}else {return $respuesta;}}

	}





	public function getTriviasDisponible($_user,$_perfil)
	{	
		$respuesta = $this->db->enviarQuery("select * from trivia_tr tr inner join pregunta_pr pr on tr.id_tr = pr.id_trivia_pr where pr.id_pr not in (select ask_re from  respuesta_re where usuario_re = $_user) and  CURRENT_DATE BETWEEN  vig_ini_tr and vig_fin_tr and tr.perfil_tr in ($_perfil) LIMIT 1");
		if (!$respuesta and $this->db->error!=''){echo $this->db->error;return false;}else{if (!$respuesta){	return false;}	else {	return $respuesta;}}
	}









	public function getTrivia($codigo)

	{	$respuesta = $this->db->enviarQuery("select * from Trivias where codigo = $codigo");

		if (!$respuesta and $this->db->error!=''){echo $this->db->error; return false;}

		else{if (!$respuesta){return false;	}else {	return $respuesta;	}	}

	}

	

	public function updateTrivia($idTrivia,$nombre,$descripcion,$precio)

	{	$respuesta = $this->db->enviarQuery("UPDATE Trivias SET Trivia = '$nombre',

													descripcion = '$descripcion',

													precio = $precio

											 WHERE codigo = $idTrivia");

				

		if (!$respuesta and $this->db->error!=''){	echo $this->db->error; 	return false;}else{if (!$respuesta){return true;}else {return $respuesta;}	}

	}	

}

?>