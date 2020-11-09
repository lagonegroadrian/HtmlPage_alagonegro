<?php

session_start();

require 'autoload.php';

if(isset($_GET['er']))
{

	switch ($_GET['er']) 
	{
		case 1:
			$_msg="Complete todos los campos";
			break;

		case 2:
			$_msg="usuario / contraseña invalidos";
			break;			
		
		default:
			$_msg="Revisar los datos ingresados";
			break;
	}
}
	if (isset($_SESSION["_nom"])){$_nom=$_SESSION["_nom"];}
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>LookMacho - Ingreso</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'></head>
	
<body>

<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Logeate en esta página' +
        '.-->'+response.status;
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2727964747490196',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v6.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };

  
  (function(d, s, id) {                      // Load the SDK asynchronously
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/es_ES/sdk.js";              
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    //console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      //console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Bienvenido , ' + response.name + '! <br> id:'+ response.id + "<br> cumpleaños "+ response.birthday
        + " <br> Correo : "+ response.email ;
        //console.log(response);

         document.getElementById('foto').innerHTML = "<img src='https://graph.facebook.com/"+response.id+"/picture?type=large' alt='Smiley face' height='42' width='42'>";
    });
  }




</script>



<!-- header -->
	<?php 
	include_once 'section/menu.php';
	?>
<!-- //header -->


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Ingreso</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Inicio</a><label>/</label>Ingreso</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">

<?php
if (isset($_msg)){
echo "<div class='contact-grid3'>";
echo "<div class='contact-grid1'>";
echo "<h4>$_msg</h4>";
echo "</div>";
echo "</div>";
}
?>

		<form action="funk/validarup.php?val=ingreso" method="POST">

			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">
					<input type="text" placeholder="Email" name="email" name="email" required=""

<?php
								if (isset($_nom)) 
								{
									echo "value='".$_nom."'";
								}
?>
								>

					<i class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="pass" id="pass" placeholder="Password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				   <!--a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Olvidaste la contraseña?</label>
					   </a-->

			
			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="login">
				</label>
					<br><br>

				<!--a href="registro.php" class="hvr-sweep-to-top">Registrar</a-->

				<!--fb:login-button perms="email,user_birthday"></fb:login-button-->





<!--fb:login-button scope="public_profile,email,user_birthday" onlogin="checkLoginState();">
</fb:login-button-->

<div id="status">
  aca
</div>

<div id="foto">
  alla
</div>

			<div class="fb-login-button" data-width="2500" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="false"></div>



	

			</div>
			
			<div class="clearfix"> </div>
			</form>

	</div>
	</div>


<!-- social -->
	<?php include("section/social.php"); ?>
<!-- //social -->

<!-- footer -->
	<?php include("section/footer.php"); ?>
<!-- //footer -->

</body>
</html>