<?php
class Tipopedido
{
	private $db;
	
	public function __construct($base){$this->db = $base;}

	public function __destruct(){$this->db = null;}

	public function insertTipopedido($_tipo_pd2,$_mensaje_pd2)
	{
		$Pedido = $this->db->enviarQuery("insert into pedidos_pd2 values (null, '".$_tipo_pd2."', '".$_mensaje_pd2."' , CURRENT_TIME);");
		if (!$Pedido){echo $this->db->error; return false;}else{return $Pedido;}
	}





	public function getTipopedido($_estado)
	{
		$Pedido = $this->db->enviarQuery("select id_tipd2, titulo_tipd2 , estado_tipd2
			FROM tipopedido_tipd2 where estado_tipd2 in (".$_estado.");");
		if (!$Pedido and $this->db->error!=''){echo $this->db->error; return false;}
		else{if (!$Pedido){return false;}else{return $Pedido;}}
	}




}
?>