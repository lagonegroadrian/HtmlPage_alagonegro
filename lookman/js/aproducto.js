$(document).ready(function(){
    
    $("#subcategoria").parent().hide();
    $("#categoriaproducto").parent().hide();
    getsubcategoria();
    
    $("#categoria").change(function(){
        getsubcategoria(); 
    });
    
    $("#subcategoria").change(function(){
        getcategoriaproducto();
    });
    
});

function getsubcategoria(){
        
        var categoriaselect = $("#categoria").val();
        var jsondata = JSON.stringify({ categoriaselect: categoriaselect });    
        
        if($("#categoria").val() == "0"){
            $("#subcategoria").parent().hide();
        }else{
            $("#subcategoria").parent().show();
        }
        
        $.ajax({
            url: "http://alagonegro.com/lookmacho/ajax/getsubcategoria.php",
            method: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: jsondata,
            success: function(respuesta){
                
                var datos = "";
                
                if(respuesta.length == 0){
                    
                }else{
                    
                    $("#subcategoria").empty();
                    datos = datos + "<option value='0' >Seleccione un valor";
                    datos = datos + "</option>";
                    
                    //var destacao = $('destac_prod').getValue();
                    var subcategory = document.getElementById("id_subcategory").value;


                    for(var i=0;i < respuesta.length;i++){
                        
                        var filtro = " ";
                        if (subcategory == respuesta[i].id_subcat)
                            {
                                var filtro = " selected ";
                            }

                        datos = datos + "<option value='"+respuesta[i].id_subcat +"' "+filtro+" >"  +respuesta[i].detalle_subcat;
                        datos = datos + "</option>";
                        
                    }
                    
                    $("#subcategoria").append(datos);
                        
                    getcategoriaproducto();
                    
                }
                
            },
            error: function(error){
                console.table(error);
            }
        });
}

function getcategoriaproducto(){
        
        var subcategoriaselect = $("#subcategoria").val();
        var jsondata = JSON.stringify({ subcategoriaselect: subcategoriaselect });      
        
        if($("#subcategoria").val() == "0"){
            $("#categoriaproducto").parent().hide();
        }else{
            $("#categoriaproducto").parent().show();
        }
        
        $.ajax({
            url: "http://alagonegro.com/lookmacho/ajax/getcategoriaproducto.php",
            method: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: jsondata,
            success: function(respuesta){
                
                var datos = "";
                
                if(respuesta.length == 0){
                    
                }else{
                    
                    $("#categoriaproducto").empty();
                    datos = datos + "<option value='0' >Seleccione un valor";
                    datos = datos + "</option>";

                    var ktgory_prd = document.getElementById("id_ktgory_prd").value;
                    
                    for(var i=0;i < respuesta.length;i++){
                        
                        var filtro = " ";
                            if (ktgory_prd == respuesta[i].id_catprod)
                            {
                                var filtro = " selected ";
                            }

                        datos = datos + "<option value='"+respuesta[i].id_catprod +"'"+ filtro +" >" + respuesta[i].titulo_catprod;
                        datos = datos + "</option>";
                        
                    }
                    
                    $("#categoriaproducto").append(datos);
                    
                }
                
            },
            error: function(error){
                console.table(error);
            }
        });
}