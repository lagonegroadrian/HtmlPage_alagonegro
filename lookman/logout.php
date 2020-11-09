<?php

session_start();

session_destroy();
//echo '<script type="text/javascript">alert("Hasta luego");</script>';
echo '<script type="text/javascript">window.location="ingreso.php";</script>';

?>