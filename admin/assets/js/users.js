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

function updateUserState(id){
    $.post(ruta+"user/update_user_state",{
        id:id,
    },function(respuesta){
        if(respuesta){
            alert('Estado cambiado correctamente.');
        }else{
            alert('Error al cambiar el estado.');
        }
    });
    return false;
}

function updateUserAdminState(id){
    $.post(ruta+"user/update_user_admin_state",{
        id:id,
    },function(respuesta){
        if(respuesta){
            alert('Estado cambiado correctamente.');
        }else{
            alert('Error al cambiar el estado.');
        }
    });
    return false;
}

function editUser(){
    var userName=document.getElementById("userName").value;
    var userId=document.getElementById("userId").value;
    var userPassword=document.getElementById("userPassword").value;
   
    if(userName!='' && userId!='' && userPassword!=''){
        $.post(ruta+"user/edit_user_db",{
            userName:userName,
            userId:userId,
            userPassword:userPassword,
        },function(respuesta){
            if(respuesta){
                window.location=ruta+"user?msj=editar"
            }else{
                $('#errorEditUser').html("<div class='alert alert-danger margin-bottom-30'>Error. Intentá de nuevo</div>");
                $('#btn-edit-user').css('display', '');
            }
        });

    }else{
        $('#errorEditUser').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos son obligatorios.</div>");
    }
    return false;
}
