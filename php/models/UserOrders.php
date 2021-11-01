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

    function getUserOrderPending($cedula){
        $con = Connect();
        $sql = "select * from usuariopedido 
                where cedula = $cedula and esfinalizado = false 
                order by pedidoid";

        $result = $con->query($sql);
        switch($result->num_rows){
            case 0:
                $usuarioPedido = null;
            case 1:
                $usuarioPedido = new UserOrder($row["cedula"],$row["pedidoid"],$row["esfinalizado"]);
                break;
            default:
                while($row = $result->fetch_assoc()) {
                    $usuarioPedido = new UserOrder(
                        $row["cedula"],$row["pedidoid"],$row["esfinalizado"]);
                    break;
                }
                break;
        }
        $con->close();
        return $usuarioPedido;
    }

    function setUserOrder($cedula){
        //PRE: existe usuario con cedula = $cedula
        //POST: crea un pedido nuevo y lo asocia al usuario
        //POST: devuelve el id del nuevo pedido o null
        $pedido = new Order(null, null, null, null, 0);
        return setOrder($pedido);
    }

    function addUserOrderProduct($cedula, $pedidoid, $productoid, $cantidad){
        /**
         * PRE: existe usuario con cedula = $cedula
         */
        /**
         * POST: si $pedidoid = null (no existe) entonces crea uno. si no se puede crear devuelve false
         * POST: si $pedidoid != null, agrega producto y cantidad al mismo. devuelve true si lo logra y 
         *      false en caso contrario
         */ 
        if ($pedidoid == null) {
            $pedidoid = setUserOrder($cedula);
        }
        if ($pedidoid != null) {
            if ( addOrderProduct($pedidoid, $productoid, $cantidad) ){
                return true;
            }
        }
        return false;
    }

    function removeUserOrderProduct($cedula, $pedidoid, $productoid, $cantidad){
        /**
         * PRE: existe usuario con cedula  = $cedula
         * PRE: existe producto con productoid = $productoid
         * PRE: existe pedido con pedidoid = $pedidoid
         */
        /**
         * POST: invoca remover producto/cantidad en pedido
         * POST: si el pedido se queda sin líneas, es desasociado del usuario y se elimina
         * POST: devuelve true en caso de éxito y false en contrario
         */
        
        $ok = removeOrderProduct($pedidoid, $productoid, $cantidad);
        if ($ok) {
            if ( count(getOrderLines($pedidoId) ) == 0) {
                $con = Connect();
                $sql = "delete from usuariopedido where cedula = $cedula and pedidoid = $pedidoid";
                $ok = $con->query($sql);
                $con->close();
                if ($ok) {
                    return deleteOrderById($pedidoid);
                }
            }
        }
        return $ok;
    }

?>