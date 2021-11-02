var ruta = 'http://'+window.location.host+'/proyecto_php_tec/admin/'

function addUser() {
    var userName=document.getElementById("userName").value;
    var userId=document.getElementById("userId").value;
    var userPassword=document.getElementById("userPassword").value;
    var isAdmin=document.getElementById("isAdmin").checked;
   
    if(userName!='' && userId!='' && userPassword!=''){
        $.post(ruta+"user/add_user_db",{
            userName:userName,
            userId:userId,
            userPassword:userPassword,
            isAdmin:isAdmin,
        },function(respuesta){
            if(respuesta==1){
                window.location=ruta+"user?msj=agregar"
            }else if(respuesta==-1){
                $('#errorAddUser').html("<div class='alert alert-danger margin-bottom-30'>Existe un usuario con esa cedula.</div>");
                $('#btn-send-user').css('display', '');
            }else{
                $('#errorAddUser').html("<div class='alert alert-danger margin-bottom-30'>Error. Intentá de nuevo</div>");
                $('#btn-send-user').css('display', '');
            }
        });

    }else{
        $('#errorAddUser').html("<div class='alert alert-danger margin-bottom-30'>Los campos son obligatorios.</div>");
    }

    return false;
}
