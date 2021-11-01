<?php 
    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class OrderLine {

        public $pedidoid;
        public $pedidolineaid;
        public $productoid;
        public $precio;
        public $cantidad;

        function __construct($pedidoid, $pedidolineaid,$productoid,$precio,$cantidad) {
            $this->pedidoid = $pedidoid;
            $this->pedidolineaid = $pedidolineaid;
            $this->productoid = $productoid;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
        }

    }
        
    function getOrderLines($pedidoId){
        $con = Connect();
        $sql = "SELECT * FROM pedidolinea where pedidoid = $pedidoid";
        $result = $con->query($sql);
        $pedidolineas = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedidoslinea[] = new OrderLine(
                    $row["pedidoid"], $row["pedidolineaid"],$row["productoid"],$row["precio"],
                        $row["cantidad"]);
            }
        } 
        $con->close();
        return $pedidolineas;
    }

    function getOrderLinesById($pedidoid, $pedidolineaid){
        $con = Connect();
        $sql = "SELECT * FROM pedidolinea WHERE where pedidoid = $pedidoid and pedidolineaid = $pedidolineaid";
        $result = $con->query($sql);
        $pedidoslinea = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedidoslinea[] = new OrderLine(
                    $row["pedidoid"], $row["pedidolineaid"],$row["productoid"],$row["precio"],
                        $row["cantidad"]);
            }
        }  
        $con->close();
        return $pedidoslinea;
    }

    function getOrderLinesByFilter($filter){
        $con = Connect();
        $sql = "SELECT * FROM pedidolinea WHERE $filter";
        $result = $con->query($sql);
        $pedidoslinea = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedidoslinea[] = new OrderLine(
                    $row["pedidoid"], $row["pedidolineaid"],$row["productoid"],$row["precio"],
                        $row["cantidad"]);
            }
        }   
        $con->close();
        return $pedidoslinea;
    }

    function setOrderLine($pedidolinea){
        $idPedido = $pedidolinea->pedidoid;
        $idLinea = $pedidolinea->pedidolineaid;
        $idProd = $pedidolinea->productoid;
        $prec = $pedidolinea->precio;
        $cant = $pedidolinea->cantidad;

        $con = Connect();
        $sql = "INSERT INTO pedido (pedidoid, pedidolineaid, productoid, precio, cantidad)
                VALUES ($idPedido, $idLinea, $idProd, $prec, $cant)";

        $result = $con->query($sql);
        $con->close();

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    function getOrderLineLastId($pedidoid){
        $con = Connect();
        $sql = "select max(pedidolineaid) from pedido where pedidoid = $pedidoid";
        $result = $con->query($sql);
        $con->close();
        return $result;
    }

    function updateOrderLineById($pedidoid, $pedidolineaid, $update){
        $con = Connect();
        $sql = "update pedido set $update where pedidoid = $pedidoid and pedidolineaid = $pedidolineaid";
        if ( $con->query($sql) ){
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }

    function deleteOrderLine($pedidolinea){
        $con = Connect();
        $sql = "delete from pedidolinea 
                where pedidoid = $pedidolinea->pedidoid and pedidolineaid = $pedidolinea->pedidolineaid";
        $ok = $con->query($sql);
        $con->close();
        if ( $ok ){
            return true;
        }
        return false;
    }

?>