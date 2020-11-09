function validar_mensaje()
{
    var nombre  = document.getElementById("nombre").value;
	var mensaje = document.getElementById("mensaje").value;
	var mail 	= document.getElementById("mail").value;

	var espacios = false;
	var cont = 0;

	expresion	= /\w+@\w+\.+[a-z]/;

	if  (
		nombre === "" || 
		mensaje === "" || 
		mail === "" 
		)
		{
			alert("Completar todos los campos");
			return false;
		}

	if (!expresion.test(mail))
	{
			alert("El correo debe respetar el siguiente formato corre@direccion.com");
			return false;
	}
		
	if(nombre.length>31){alert("Nombre no puede tener mas de 30 caracteres");return false;}
	if(mensaje.length>501){alert("mail no puede tener mas de 500 caracteres");return false;}
	if(mail>31){alert("El correo debe tener mas de 30 caracteres");return false;}

}