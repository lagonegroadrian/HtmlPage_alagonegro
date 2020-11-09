<?php
class Pedido
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertPedido($_tipo_pd2,$_mensaje_pd2)
	{
		$Pedido = $this->db->enviarQuery("insert into pedidos_pd2 values (null, $_tipo_pd2 , '".$_mensaje_pd2."' 
			, CURRENT_TIME);");
		if (!$Pedido){echo $this->db->error; return false;}else{return $Pedido;}	
	}





	public function getPedido()
	{
		$Pedido = $this->db->enviarQuery("select 
			id_pd2,
			tipo_pd2,
			titulo_tipd2,
			SUBSTRING(mensaje_pd2,1,30) as mensaje_pd2,
			creado_pd2,
			concat('Creado el ',DATE_FORMAT(creado_pd2, '%d-%m-%Y'),' a las ',DATE_FORMAT(creado_pd2, '%H:%i')) 
			as cuando_pd2
			FROM pedidos_pd2
			inner join tipopedido_tipd2 on tipo_pd2 = id_tipd2 order by creado_pd2 desc");
		if (!$Pedido and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Pedido){return false;}else{return $Pedido;}}
	}


	public function getUnPedido($_id)
	{
		$Pedido = $this->db->enviarQuery("select 
			id_pd2,
			tipo_pd2,
			titulo_tipd2,
			SUBSTRING(mensaje_pd2,1,30) as mensaje_pd2,
			creado_pd2,
			concat('Creado el ',DATE_FORMAT(creado_pd2, '%d-%m-%Y'),' a las ',DATE_FORMAT(creado_pd2, '%H:%i')) 
			as cuando_pd2
			FROM pedidos_pd2
			inner join tipopedido_tipd2 on tipo_pd2 = id_tipd2 
			where id_pd2 = $_id");
		if (!$Pedido and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Pedido){return false;}else{return $Pedido;}}
	}




}
?>