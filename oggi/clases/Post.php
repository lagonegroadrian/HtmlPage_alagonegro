<?php

class Post {

	private $db;

	public function __construct($base){	$this->db = $base;}

	public function __destruct() {		$this->db = null;	}

	public function insertPost($_user,$_titu,$_test,$_img1){$Post = $this->db->enviarQuery("insert into post_po values (null,$_user, '$_titu','$_test','$_img1',CURRENT_TIMESTAMP,1)");
	if (!$Post){echo $this->db->error; return false;}else{return $Post;}
	}


	public function getLastPost(){
		$Post = $this->db->enviarQuery("select (max(id_po)+1) as ultimoid from post_po");
		if (!$Post and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Post){return false;}else {return $Post;}}}



	public function getPost($activo){
		$Post = $this->db->enviarQuery("select	id_po,user_po,titu_po,testo_po,img1_po,alta_po, 
		TIMESTAMPDIFF(HOUR, `alta_po`,CURRENT_TIMESTAMP) as diasdif, 
		name_vnddor ,apellido_vnddor,avatar,activo
		from post_po
		inner join vendedor on user_po = nrodoc_vnddor 
		where activo in ($activo)
		order by alta_po DESC");
		if (!$Post and $this->db->error!=''){echo $this->db->error; return false;}else{	if (!$Post){return false;}else{return $Post;}}}



	public function updatePost($idPost,$estado){
		$Post = $this->db->enviarQuery("update post_po SET activo= '$estado' WHERE id_po = $idPost");
		if (!$Post and $this->db->error!=''){echo $this->db->error;return false;}else{if (!$Post){return true;}else{return $Post;}}
	}

	

	public function deletePost($idPost){
		$Post = $this->db->enviarQuery("DELETE FROM Posts WHERE codigo = $idPost");	
		if (!$Post and $this->db->error!=''){echo $this->db->error; return false;}else{	return $Post;}}
}

?>