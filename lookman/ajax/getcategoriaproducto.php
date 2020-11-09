<?php

require '../autoload.php';
session_start();

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);
$json_obj->subcategoriaselect;

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$productoPto = new CategoriaCascada($base);
$subcategorias = $productoPto->getCategoriaProducto(strval($json_obj->subcategoriaselect));

echo json_encode($subcategorias);

?>