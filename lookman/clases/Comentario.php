<?php
class Comentario {
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct() {$this->db = null;}

	public function insertComentario($_id_producto,$_id_usuario,$_review,$_nro_ip,$_punt,$_mail)
	{
		$Comentario = $this->db->enviarQuery("insert into review values (null, $_id_producto,$_id_usuario,
			'".$_review."',current_date,$_nro_ip,$_punt, '".$_mail."', 0)");

		if (!$Comentario){echo $this->db->error; return false;}
		else{return $Comentario;}
	}
	
	
	public function getComentario($_limite,$_producto)
		{
		$Comentario = $this->db->enviarQuery("select usuario_nombre, review ,DATE_FORMAT(fecha_hora,'%d/%m/%Y %h:%i:%s') as fecha_hora, mail
		from review revi
		left join usuario usua on revi.id_usuario = usua.id_usuario
		where revi.id_producto = $_producto  and publicar = 1  order by fecha_hora desc limit $_limite");
		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Comentario){return false;}else {return $Comentario;}}
		}	


	public function getComentarioPrevio($_producto,$_ip)
		{
		$Comentario = $this->db->enviarQuery("select count(*) as cantidad
		from review	where id_producto = $_producto  and fecha_hora = current_date and nro_ip = $_ip");

		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Comentario){return false;}else {return $Comentario;}}
		}


		public function getComentarioPromedio($_pr)
		{
		$Comentario = $this->db->enviarQuery("select AVG(punto) as promedio
				from review
				where id_producto = $_pr   
				and publicar = 1
				and punto is not null");
		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Comentario){return false;}else {return $Comentario;}}
		}



		public function getListarComentario($_estado)
		{
		$Comentario = $this->db->enviarQuery("select
		re.id_review as id_com,
		re.id_producto as id_prod,
		pr.titulo as producto,
		re.review as comentario,
		us.usuario_nombre as usuario,
		re.fecha_hora,
		re.punto,
		re.mail,
		publicar
		from review re
		inner join producto  pr on re.id_producto = pr.id_producto
		left join usuario us on us.id_usuario = re.id_usuario
		where publicar = $_estado");
		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Comentario){return false;}else {return $Comentario;}}
		}



		public function getProd($_prod)
		{
		$Comentario = $this->db->enviarQuery("select 
		prod.id_Comentario as id_Comentario 
		,titulo
		,prod.descripcion as prod_descripcion
		,descripcion_detallada
		,precio
		,puntaje
		,orden
		,imagen_filesystem
		,tama.descripcion as tama_descripcion
		FROM Comentario prod
		inner join imagen_Comentario imgprod on prod.id_Comentario = imgprod.id_Comentario
		left join tamanio tama on prod.id_tamanho = tama.id_tamanio
		where prod.id_Comentario in ($_prod)
		order by prod.id_Comentario,puntaje , orden asc");
		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Comentario){return false;}else {return $Comentario;}}
		}
	

	
	public function updateComentario($idComentario,$_estado){		
		$Comentario = $this->db->enviarQuery("update review
			set publicar = $_estado
			where id_review = $idComentario;");
		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Comentario){return true;}else {return $Comentario;}}
	}
	
	public function deleteComentario($idComentario)
	{
		$Comentario = $this->db->enviarQuery("DELETE FROM Comentarios WHERE codigo = $idComentario");	
		
		if (!$Comentario and $this->db->error!=''){echo $this->db->error; return false;}
		else{return $Comentario;}
	}
	
}
?>