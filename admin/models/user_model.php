<?php
  include_once(LIBS.'/database.php');

class UserModel {
    public $cedula;
    public $password;
    public $usuarioNombre;
    public $esHabilitado;
    public $esActivo;
    public $esAdmin;
    

     function __construct($cedula,$password,$usuarioNombre,$esHabilitado,
                            $esActivo,$esAdmin){
        $this->usuarioNombre=$usuarioNombre;
        $this->esHabilitado=$esHabilitado;
        $this->cedula=$cedula;
        $this->password=$password;
        $this->esActivo=$esActivo;
        $this->esAdmin=$esAdmin;
    }
}

     function allUsers(){
        $link = Connect();
        $sql = "SELECT * FROM usuario";
        $result = $link->query($sql);
        $listUsuarios = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $listUsuarios[] = new UserModel($row["cedula"],$row["password"],$row["usuarionombre"],$row["eshabilitado"],
                                                    $row["usuarioesactivo"],$row["esadmin"]);
            }
        } 
        $link->close();
        return $listUsuarios;
    }

    function getUserById($cedula){
        $con = Connect();
        $sql = "SELECT * FROM usuario WHERE cedula = $cedula";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return new UserModel(
                    $row["cedula"],$row["password"],$row["usuarionombre"],
                    $row["eshabilitado"],$row["usuarioesactivo"],$row["esadmin"]);
            }
        } 
        $con->close();
        return null;
    }


    function existsUser($id){
        $link = Connect();
        $sql = "SELECT * FROM usuario WHERE cedula=$id";
        $result = $link->query($sql);
        $existe=false;
        if($result->num_rows>0){
            $existe=true;
        }
        $link->close();
        return $existe;
    }


    function putUser($userName,$userId,$userPassword,$isAdmin){
        if(!existsUser($userId)){
            $link = Connect();
            $sql = "INSERT INTO usuario(cedula, password, usuarionombre, eshabilitado, esadmin) VALUES ($userId,'$userPassword','$userName',1,'$isAdmin')";
            return $link->query($sql);
        }else{
            return -1;
        }
    }

    function updateUserState($id){
        $link = Connect();
        $sql = "UPDATE usuario SET eshabilitado = CASE WHEN eshabilitado = 0 then 1 WHEN eshabilitado = 1 then 0 ELSE eshabilitado END WHERE cedula = $id";
        return $link->query($sql);
    }

    function updateUserAdminState($id){
        $link = Connect();
        $sql = "UPDATE usuario SET esadmin = CASE WHEN esadmin = 0 then 1 WHEN esadmin = 1 then 0 ELSE esadmin END WHERE cedula = $id";
        return $link->query($sql);
    }

    function editUser($userId,$userPassword,$userName){
        $link = Connect();
        $sql = "UPDATE usuario SET password = '$userPassword', usuarionombre = '$userName' WHERE cedula = $userId";
        return $link->query($sql);
    }





?>