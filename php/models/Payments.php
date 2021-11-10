<?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class Payment {

        public $mediodepagoid;
        public $mediodepagonombre;

        function __construct($mediodepagoid,$mediodepagonombre) {
            $this->mediodepagoid=$mediodepagoid;
            $this->mediodepagonombre=$mediodepagonombre;
        }

    }
        
    function getPayments(){
        $con = Connect();
        $sql = "SELECT * FROM mediodepago";
        $result = $con->query($sql);
        $mediopagos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $mediopagos[] = new Payment(
                    $row["mediodepagoid"],$row["mediodepagonombre"]);
            }
        } 
        $con->close();
        return $mediopagos;
    }

    function getPaymentById($mediodepagoid){
        $con = Connect();
        $sql = "SELECT * FROM mediopago WHERE mediodepagoid = $mediodepagoid";
        $result = $con->query($sql);
        $con->close();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return new Payment(
                    $row["mediodepagoid"],$row["mediodepagonombre"]);
            }
        } 
        
        return null;
    }

    function setPayment($mediodepagonombre){
        /**
         * PRE: ninguna
         */
        /**
         * POST: intenta insertar un nuevo medio de pago. si lo logra, devuelve el id. sino, devuelve null
         */
        $con = Connect();
        $sql = "insert into mediodepago(mediodepagonombre) values('$mediodepagonombre')";
        $ok = $con->query($sql);
        $mediodepagoid = $con->insert_id;
        $con->close();

        if ($mediodepagoid > 0) {
            return $mediodepagoid;
        }

        return null;
    }

?>