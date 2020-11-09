<?php

set_error_handler("myFunctionErrorHandler", E_WARNING);

// función de gestión de errores
function myFunctionErrorHandler($errno, $errstr, $errfile, $errline)
{
    /* Según el típo de error, lo procesamos */
    switch ($errno) {
       case E_WARNING:
                //echo "Hay un WARNING <br />\n";
                //echo "El warning es: ". $errstr ."<br />\n";
                //echo "El fichero donde se ha producido el warning es: ". $errfile ."<br />\n";
                //echo "La línea donde se ha producido el warning es: ". $errline ."<br />\n";
                /* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
                return true;
                break;
            
            case E_NOTICE:
                //echo "Hay un NOTICE:<br />\n";
                /* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
                return true;
                break;
            
            default:
                /* Ejecuta el gestor de errores interno de PHP */
                return false;
                break;
            }
}

function setearConexion()
{
	define('DB_SERVER', 'localhost');
	//define('DB_USERNAME', 'asdavinc_pw_n026');
	//define('DB_PASSWORD', 'esmr63c3txaf5k4r');
	//define('DB_NAME', 'asdavinc_pw_acn3a_20192_equipo12');

	define('DB_USERNAME', 'c1701367_lookma');
	define('DB_PASSWORD', 'bu97BUnuzi');
	define('DB_NAME', 'c1701367_lookma');
}


function establecerConexion()
{
	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	 
	// Check connection
	if($link === false)	{throw new Exception("ERROR: En estos momentos no nos podemos conectar a la base de datos :( ");}
	return $link;
}


	try
	{
		setearConexion();
		$link=establecerConexion();
	}
	catch(Exception $e)
	{
	//Capturar excepciones
	$mensaje = $e->getMessage();
	$code = $e->getCode();
	}

 if(!empty($mensaje)){
 	echo "string";
 ?>
 	<script type="text/javascript">
 					<?php echo "alert('$mensaje');" ?>
					window.location='../index.php'
	</script>
 <?php
 }

?>