<?php
    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class Categoria {
        // Properties
        public $idCategoria;
        public $nombre;

        function __construct($idCategoria,$nombre) {
            $this->categoriaid=$idCategoria;
            $this->categorianombre=$nombre;
        }
         
    }
    function putCategoria($nombre){
        $link = Connect();
        $sql = "insert into categoria(categorianombre) values('$nombre')";
        $resultado = $link->query($sql);
        $link->close();

        return null;
    }

    function getCategoria($nombre){
        $link = Connect();
        $sql = "select * from categoria where categorianombre = '$nombre'";
        $resultado = $link->query($sql);
        $row = $resultado->fetch_assoc();
        $link->close();

        return new Categoria($row["categoriaid"], $row["categorianombre"]);
    }

    function getCategorias(){
        $link = Connect();
        $sql = "SELECT * FROM categoria";
        $result = $link->query($sql);
        $listCategorias = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $listCategorias[] = new Categoria($row["categoriaid"],$row["categorianombre"]);
            }
        } 

        $link->close();

        return $listCategorias;
    }
       
?>