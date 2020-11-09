function ordenar(codigo){
    var http = new XMLHttpRequest();

    var catpro = document.getElementById("catpro").value;
    var subcat = document.getElementById("subcat").value;
    var oorden = document.getElementById("ordenar").value;
    var marcaa = document.getElementById("marca").value;

	var llamadoDe = window.location.pathname;
	//    alert('Paso piola --->'+marcaa+'---> '+catpro);

    http.onreadystatechange = function()
    {if(http.readyState==4 && http.status==200){document.getElementById("mid-popular").innerHTML = http.responseText;}}

    if (catpro != '-')
    {
        if(marcaa!='todo')
        {
            http.open("POST","http://alagonegro.com/lookmacho/section/listarprod.php?catprod="+catpro+"&ord="+oorden+"&filtro="+marcaa,true);
        }
        else
        {            
            http.open("POST","http://alagonegro.com/lookmacho/section/listarprod.php?catprod="+catpro+"&ord="+oorden,true);
        }

    }
    else
    {
        if(marcaa!='todo')
        {        
            http.open("POST","http://alagonegro.com/lookmacho/section/listarprod.php?scat="+subcat+"&ord="+oorden+"&filtro="+marcaa,true);
        }
        else
        {
            http.open("POST","http://alagonegro.com/lookmacho/section/listarprod.php?scat="+subcat+"&ord="+oorden,true);
        }
    } 

    http.send();
}