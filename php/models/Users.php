<?php 
    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class User {

        public $cedula;
        public $password;
        public $usuarionombre;
        public $eshabilitado;
        public $usuarioesactivo;
        public $esadmin;

        function __construct($cedula,$password,$usuarionombre,$eshabilitado,
        $usuarioesactivo,$esadmin) {
            $this->cedula=$cedula;
            $this->password=$password;
            $this->usuarionombre=$usuarionombre;
            $this->eshabilitado=$eshabilitado;
            $this->usuarioesactivo=$usuarioesactivo;
            $this->esadmin=$esadmin;
        }
    }
        
    public function getUsers(){
        $con = Connect();
        $sql = "SELECT * FROM usuario";
        $result = $con->query($sql);
        $usuarios = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usuarios[] = new User(
                    $row["cedula"],$row["password"],$row["usuarionombre"],
                    $row["eshabilitado"],$row["usuarioesactivo"],$row["esadmin"]);
            }
        } 
        $con->close();
        return $usuarios;
    }

    function getUserById($cedula){
        $con = Connect();
        $sql = "SELECT * FROM usuario WHERE cedula = $cedula";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return new User(
                    $row["cedula"],$row["password"],$row["usuarionombre"],
                    $row["eshabilitado"],$row["usuarioesactivo"],$row["esadmin"]);
            }
        } 
        $con->close();
        return null;
    }

    function getUserByFilter($filtro){
        $con = Connect();
        $sql = "SELECT * FROM usuario WHERE $filtro";
        $result = $con->query($sql);
        $usuarios = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usuarios[] = new User(
                    $row["cedula"],$row["password"],$row["usuarionombre"],
                    $row["eshabilitado"],$row["usuarioesactivo"],$row["esadmin"]);
            }
        } 
        $con->close();
        return $usuarios;
    }

    function login($cedula, $password){
        $con = Connect();
        $sql = "SELECT * FROM usuario WHERE cedula = $cedula AND password = $password";
        $result = $con->query($sql);
        $con->close();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return new User(
                    $row["cedula"],$row["password"],$row["usuarionombre"],
                    $row["eshabilitado"],$row["usuarioesactivo"],$row["esadmin"]);
            }
        } 
        return null;
    }

    

?>