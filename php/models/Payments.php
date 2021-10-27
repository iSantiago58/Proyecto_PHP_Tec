<?php 
    header('Content-Type: application/json');
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
        $sql = "SELECT * FROM mediopago";
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



?>