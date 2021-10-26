<?php 
    header('Content-Type: application/json');
    include_once '.\Connection.php';

    class Order {

        public $pedidoid;
        public $fechacompra;
        public $direccionenvio;
        public $direccionfacturacion;
        public $feedback;
        public $importetotal;

        function __construct($pedidoid,$fechacompra,$direccionenvio,$direccionfacturacion,$feedback,$importetotal) {
            $this->pedidoid=$pedidoid;
            $this->fechacompra=$fechacompra;
            $this->direccionenvio=$direccionenvio;
            $this->direccionfacturacion=$direccionfacturacion;
            $this->feedback=$feedback;
            $this->importetotal=$importetotal;
        }
        
        function getOrders(){
            $con = Connect();
            $sql = "SELECT * FROM pedido";
            $result = $con->query($sql);
            $pedidos = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pedidos[] = new Order(
                        $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                            $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
                }
            } 
            $con->close();
            return $pedidos;
        }

        function getOrderById($pedidoid){
            $con = Connect();
            $sql = "SELECT * FROM pedido WHERE pedidoid = $pedidoid";
            $result = $con->query($sql);
            $pedidos = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pedidos[] = new Order(
                        $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                            $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
                }
            }  
            $con->close();
            return $pedidos;
        }

        function getOrderByFilter($filter){
            $con = Connect();
            $sql = "SELECT * FROM pedido WHERE $filter";
            $result = $con->query($sql);
            $pedidos = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pedidos[] = new Order(
                        $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                            $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
                }
            }  
            $con->close();
            return $pedidos;
        }

        function setOrder($pedido){

            $id = $pedido->$pedidoid
            $fchCompra = $pedido->$fechacompra
            $dirEnvio = $pedido->$direccionenvio
            $dirFact = $pedido->$direccionfacturacion
            $feedb = $pedido->$feedback
            $imp = $pedido->$importetotal

            $con = Connect();
            $sql = "INSERT INTO pedido (pedidoid, fechacompra, direccionenvio, direccionenvio, direccionfacturacion, feedback, importetotal)
                    VALUES ($id, $fchCompra, $dirEnvio, $dirFact, $feedb, $imp)";

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