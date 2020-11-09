<?php

/*
Validaciones para:
0-valore nulos
1-injection
2-cantidad de caracteres
*/

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

require '../autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);

$pedido = new Pedido($base);

$_tipo_pd2 = $_POST['new_pedido_tipo'];
$_mensaje_pd2 = $_POST['new_pedido_mensaje'];

$inserto_pedido = $pedido->insertPedido($_tipo_pd2,$_mensaje_pd2);
echo "<script language=Javascript> location.href=\"../index_usere.php\"; </script>";
exit();    

?>