function agregar(codigo){
    var http = new XMLHttpRequest();
    var codigo = document.getElementById("dni").value;
    var covnta = document.getElementById("nro_com").value;

    

    http.onreadystatechange = function(){
        if(http.readyState==4 && http.status==200){document.getElementById("respuesta").innerHTML = http.responseText;}
    }
    http.open("POST","https://appcomerciales.com.ar/oggi/liq.php?codigo="+codigo+"&vndr="+covnta,true);
    http.send();
}