<?php

require '../autoload.php';
session_start();

class SubCategoria {
    public function __construct($id_subcat, $detalle_subcat) {
        $this->Id_subcat = $id_subcat;
        $this->Detalle_subcat = $detalle_subcat;
    }
}

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);
$json_obj->categoriaselect;

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$productoPto = new CategoriaCascada($base);
$subcategorias = $productoPto->getSubCategoria(strval($json_obj->categoriaselect));

echo json_encode($subcategorias);

?>