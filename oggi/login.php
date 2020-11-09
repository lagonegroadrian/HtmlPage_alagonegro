<?php

session_start();
  
  if (isset($_SESSION["nombre_us"]))
    { echo '<script type="text/javascript">window.location="index.php";</script>';} 


?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Oggi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 5px 0;
  border: 1px;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.imgcontainer {
  text-align: center;
  
  background-color: #5AB0DF;
}

img.avatar {
  width: 30%;
  border-radius: 5%;

}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}














































.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  /* position: absolute;*/
  bottom: 23px;
  right: 28px;
  width: 280px;
  margin-left: 10px}

















/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 280px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
































<form action="funk/validaruser.php" method="post">
  <div class="imgcontainer">
    <!--img src="w3images/lights.jpg" alt="Avatar" class="avatar"-->
    <img src="w3images/login2.jpeg" alt="Avatar" class="avatar">
  </div>

  <div>
    <!--label for="uname"><b>Username</b></label-->
    <!--label for="psw"><b>Password</b></label-->

    <input type="text" placeholder="Ingrese Usuario" name="uname" required>
    <input type="password" placeholder="Ingrese Password" name="psw" required>

    <button type="submit">Ingresar</button>

  </div>

    
    <!--div class="clearfix">
      <button type="button" class="cancelbtn">Central de quejas</button>
      <a href="../qsr" target='_blank'>

        <button type="button" style="background-color:#FFA310;" >Central de quejas</button>
      </a>
    </div-->
    

</form>

<br>
<br>
<button class="open-button" onclick="openForm()">Retornar a Home</button>
<br>
<br>


<script>
function openForm() {
  //document.getElementById("myForm").style.display = "block";
  location.href = "../index.html";
}
</script>

</body>



</html>