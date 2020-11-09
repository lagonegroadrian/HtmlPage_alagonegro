<?php
require_once("conexion.php");

class consulta extends conexion{
	private $query;
	private $listado = array();

	function __construct($_server,$_usuario,$_password,$_nombre,$_query)
	{	
		parent::__construct($_server,$_usuario,$_password,$_nombre);

		$conexion = new conexion('localhost', 'asdavinc_pw_n026', 'esmr63c3txaf5k4r','asdavinc_pw_acn3a_20192_equipo12');
		$conexion->conectar();		
		$conexion->retornar_link();	

		setear_query($_query);
	}


	public function ejecutar_consulta()
	{
		$resultado=mysqli_query(retornar_link(),retornar_query());

		while($row=mysqli_fetch_array($resultado)) 
		{
			array_push($listado, array("categoria"=>$row["categoria"], "detalle_cat"=>$row["detalle_cat"],"id_subcat"=>$row["id_subcat"],"detalle_subcat"=>$row["detalle_subcat"],"id_catprod"=>$row["id_catprod"],"titulo_catprod"=>$row["titulo_catprod"]));
		}
		setear_listado($listado);
	}
	
	//public function setear_link($_link){$this->link=$_link;}
	//public function retornar_link(){return $this->link;}

	public function setear_query($_query){$this->query=$_query;}
	public function retornar_query(){return $this->query;}

	public function setear_listado($_listado){$this->listado=$_listado;}
	public function retornar_listado(){return $this->listado;}

}
?>