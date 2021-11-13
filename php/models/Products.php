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
        public $imagenes;

        function __construct($idProducto,$nombreProd,$descProd,$precioProd,
        $stock,$esActivoProd,$categoriaProd,$imagenes=null) {
            $this->idProducto=$idProducto;
            $this->nombreProd=$nombreProd;
            $this->descProd=$descProd;
            $this->precioProd=$precioProd;
            $this->stock=$stock;
            $this->esActivoProd=$esActivoProd;
            $this->categoriaProd=$categoriaProd;
            $this->imagenes=$imagenes;
        }

    }

    function getProducts(){
        $con = Connect();
        $sql = "SELECT * FROM producto";
        $result = $con->query($sql);
        $productos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $imagenes = getImages($row["productoid"])[0];
                $productos[] = new Product(
                    $row["productoid"],$row["productonombre"],preg_replace('/\s+/', '', $row["productodescripcion"]),
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"],$imagenes);
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
        $imagenes = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $imagenes = getImages($row["productoid"]);
                $producto[] = new Product(
                    $row["productoid"],$row["productonombre"],preg_replace('/\s+/', '', $row["productodescripcion"]),
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"],$imagenes);
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
                    $row["productoid"],$row["productonombre"],preg_replace('/\s+/', '', $row["productodescripcion"]),
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
                    $row["productoid"],$row["productonombre"],preg_replace('/\s+/', '', $row["productodescripcion"]),
                    $row["productoprecio"],$row["stock"],$row["productoesactivo"],
                    $row["categoriaid"]);
            }
        } 
        $con->close();
        return $productos;
    }

    function updateProductStock($productoid, $cantidad){
        $con = Connect();
        $sql = "update producto set stock = (stock + $cantidad)
                where productoid = productoid";
        $ok = $con->query($sql);
        $con->close();
        if ($ok){
            return true;
        }
        return false;
    }

?>