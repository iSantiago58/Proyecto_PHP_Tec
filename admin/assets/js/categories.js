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

function editCategory(){
    var categoryName=document.getElementById("categoryName").value;
    var categoryId=document.getElementById("categoryId").value;
   
    if(categoryName!=''){
        $.post(ruta+"category/edit_category_db",{
            categoryName:categoryName,
            categoryId:categoryId,
        },function(respuesta){
            if(respuesta){
                window.location=ruta+"category?msj=editar"
            }else{
                $('#errorEditCategory').html("<div class='alert alert-danger margin-bottom-30'>Error. Intentá de nuevo</div>");
                $('#btn-edit-category').css('display', '');
            }
        });

    }else{
        $('#errorEditCategory').html("<div class='alert alert-danger margin-bottom-30'>El nombre de la categoría no puede ser vacío.</div>");
    }

    return false;
}