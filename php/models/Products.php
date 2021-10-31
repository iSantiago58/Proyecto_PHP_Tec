<?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class Product {

        public $idProducto;
        public $nombreProd;
        public $descProd;
        public $precioProd;
        public $stock;
        public $esActivoProd;
        public $categoriaProd;

        function __construct($idProducto,$nombreProd,$descProd,$precioProd,
        $stock,$esActivoProd,$categoriaProd) {
            $this->idProducto=$idProducto;
            $this->nombreProd=$nombreProd;
            $this->descProd=$descProd;
            $this->precioProd=$precioProd;
            $this->stock=$stock;
            $this->esActivoProd=$esActivoProd;
            $this->categoriaProd=$categoriaProd;
        }

    }

    function getProducts(){
        $con = Connect();
        $sql = "SELECT * FROM producto";
        $result = $con->query($sql);
        $productos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = new Product(
                    $row["productoid"],$row["productonombre"],$row["productodescripcion"],
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"]);
            }
        } 
        $con->close();
        return $productos;
    }

    function getProductById($idProducto){
        $con = Connect();
        $sql = "SELECT * FROM producto WHERE productoid = $idProducto";
        $result = $con->query($sql);
        $producto = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $producto[] = new Product(
                    $row["productoid"],$row["productonombre"],$row["productodescripcion"],
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"]);
            }
        } 
        $con->close();
        return $producto;
    }

    function getProductsByOrder($orden){
        $con = Connect();
        $sql = "SELECT * FROM producto ORDER BY $orden";
        $result = $con->query($sql);
        $productos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = new Product(
                    $row["productoid"],$row["productonombre"],$row["productodescripcion"],
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"]);
            }
        } 
        $con->close();
        return $productos;
    }

    function getProductsByFilter($filtro){
        $con = Connect();
        $sql = "SELECT * FROM producto WHERE $filtro";
        $result = $con->query($sql);
        $productos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = new Product(
                    $row["productoid"],$row["productonombre"],$row["productodescripcion"],
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"]);
            }
        } 
        $con->close();
        return $productos;
    }

?>