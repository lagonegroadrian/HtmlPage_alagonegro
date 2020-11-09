<?php
class Perfil
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

/*
[Columna]
id_prf	int(11) Incremento automático	
txt_pfl	varchar(50)	
act_pfl	int(1)	
fec_pfl	int(11)	
kend_pfl	varchar(30)
*/
	public function insertPerfil($_txt,$_act,$_kend)
	{
		$Perfil = $this->db->enviarQuery("insert into perfil_prf values (null, '".$_txt."', '".$_act."' , CURRENT_DATE, '".$_kend."');");
		if (!$Perfil){echo $this->db->error; return false;}else{return $Perfil;}
	}
		
	public function getPerfil($_estao)
	{
		$Perfil = $this->db->enviarQuery("select id_prf , txt_pfl , act_pfl, fec_pfl , kend_pfl from perfil_prf where  act_pfl in ($_estao) ");
		if (!$Perfil and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Perfil){return false;}else{return $Perfil;}}
	}



	public function getPerfilz($_perfil)
	{
		$Perfil = $this->db->enviarQuery("select id_prf , txt_pfl , act_pfl, fec_pfl , kend_pfl from perfil_prf where id_prf = $_perfil ");
		if (!$Perfil and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Perfil){return false;}else{return $Perfil;}}
	}


	public function updatePerfil($_txt,$_act,$_kend,$_id)
	{
		$Perfil = $this->db->enviarQuery("update perfil_prf 
			set 
			txt_pfl = '".$_txt."' ,
			act_pfl = '".$_act."' ,
			fec_pfl = CURRENT_DATE ,
			kend_pfl= '".$_kend."'
			where id_prf = $_id ");

		if (!$Perfil and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Perfil){return true;}else {return $Perfil;}}
	}
	
	public function deletePerfil($idPerfil)
	{
		$Perfil = $this->db->enviarQuery("DELETE FROM Perfils WHERE codigo = $idPerfil");	
		if (!$Perfil and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $Perfil;}
	}	
}
?>