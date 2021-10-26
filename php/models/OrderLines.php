<?php 
    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class OrderLine {

        public $pedidolineaid;
        public $productoid;
        public $precio;
        public $cantidad;

        function __construct($pedidolineaid,$productoid,$precio,$cantidad) {
            $this->pedidolineaid=$pedidolineaid;
            $this->productoid=$productoid;
            $this->precio=$precio;
            $this->cantidad=$cantidad;
        }
        
        function getOrderLines(){
            $con = Connect();
            $sql = "SELECT * FROM pedidolinea";
            $result = $con->query($sql);
            $pedidoslinea = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pedidoslinea[] = new OrderLine(
                        $row["pedidolineaid"],$row["productoid"],$row["precio"],
                            $row["cantidad"]);
                }
            } 
            $con->close();
            return $pedidoslinea;
        }

        function getOrderLinesById($pedidolineaid){
            $con = Connect();
            $sql = "SELECT * FROM pedidolinea WHERE pedidolineaid = $pedidolineaid";
            $result = $con->query($sql);
            $pedidoslinea = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pedidoslinea[] = new OrderLine(
                        $row["pedidolineaid"],$row["productoid"],$row["precio"],
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
                        $row["pedidolineaid"],$row["productoid"],$row["precio"],
                            $row["cantidad"]);
                }
            }   
            $con->close();
            return $pedidoslinea;
        }

        function setOrderLine($pedidolinea){

            $idLinea = $pedidolinea->$pedidolineaid
            $idProd = $pedidolinea->$productoid
            $prec = $pedidolinea->$precio
            $cant = $pedidolinea->$cantidad

            $con = Connect();
            $sql = "INSERT INTO pedido (pedidolineaid, productoid, precio, cantidad)
                    VALUES ($idLinea, $idProd, $prec, $cant)";

            $result = $con->query($sql);
            $con->close();

            if $result == true{
                return true;   
            } else {
                return false;
            }
        }

    }

?>