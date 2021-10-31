var ruta = 'http://'+window.location.host+'/proyecto_php_tec/admin/'

function addCategory(){
    var categoryName=$('#categoryName').val();
    if(categoryName!=''){
        $('#errorAddCategory').html("<div class='alert alert-success margin-bottom-30'>Procesando...</div>");
        $('#btn-send-category').css('display', 'none');
        $.post(ruta+"category/add_category_db",{categoryName:categoryName},function(respuesta){
            if(respuesta==1){
                window.location=ruta+"category?msj=agregar"
            }else if(respuesta==-1){
                $('#errorAddCategory').html("<div class='alert alert-danger margin-bottom-30'>Existe una categoria con ese nombre.</div>");
                $('#btn-send-category').css('display', '');
            }else{
                $('#errorAddCategory').html("<div class='alert alert-danger margin-bottom-30'>Error. Intentá de nuevo</div>");
                $('#btn-send-category').css('display', '');
            }
        });
    }else{
        $('#errorAddCategory').html("<div class='alert alert-danger margin-bottom-30'>Los campos son obligatorios</div>");
        $('btn-send-category').css('display', '');
    }
    
    return false;
}