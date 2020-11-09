<?php
require 'autoload.php';
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>LookMan</title>
<meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tendencia para el Machoo de hoy" />
<script type="application/x-javascript"> 
		addEventListener("load", function() 
			{ setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
</head>
	
<body>
					
<?php
	include_once 'section/menu.php';
	include_once 'section/destacado.php';
	echo "<br>";
	include_once 'section/rankin.php';
	include_once 'section/social.php';
	include_once 'section/footer.php';
?>

</body>

</html>