<?php 
    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class UserOrder {

        public $cedula;
        public $pedidoid;
        public $esfinalizado;

        function __construct($cedula,$pedidoid,$esfinalizado) {
            $this->cedula=$cedula;
            $this->pedidoid=$pedidoid;
            $this->esfinalizado=$esfinalizado;
        }
        
        function getUserOrders(){
            $con = Connect();
            $sql = "SELECT * FROM usuariopedido";
            $result = $con->query($sql);
            $usuariosPedidos = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuariosPedidos[] = new UserOrder(
                        $row["cedula"],$row["pedidoid"],$row["esfinalizado"]);
                }
            } 
            $con->close();
            return $usuariosPedidos;
        }

        function getUserOrderByCI($cedula){
            $con = Connect();
            $sql = "SELECT * FROM usuariopedido WHERE cedula = $cedula";
            $result = $con->query($sql);
            $usuariosPedidos = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuariosPedidos[] = new UserOrder(
                        $row["cedula"],$row["pedidoid"],$row["esfinalizado"]);
                }
            }  
            $con->close();
            return $usuariosPedidos;
        }

        function getUserOrderById($cedula, $pedidoid){
            $con = Connect();
            $sql = "SELECT * FROM usuariopedido WHERE cedula = $cedula AND pedidoid = $pedidoid";
            $result = $con->query($sql);
            $usuariosPedidos = [];

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuariosPedidos[] = new UserOrder(
                        $row["cedula"],$row["pedidoid"],$row["esfinalizado"]);
                }
            }  
            $con->close();
            return $usuariosPedidos;
        }

        function getUserOrderState($cedula, $pedidoid){
            $con = Connect();
            $sql = "SELECT * FROM usuariopedido WHERE cedula = $cedula AND pedidoid = $pedidoid";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuarioPedido = new UserOrder(
                        $row["cedula"],$row["pedidoid"],$row["esfinalizado"]);
                }
            }  
            $con->close();
            return $usuarioPedido->$esfinalizado;
        }

    }

?>