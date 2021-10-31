<?php
function Connect(){
    $servername = "localhost";
    $database = "proyecto_php_tec";
    $username = "root";
    $password = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    $conn->select_db("proyecto_php_tec");
    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    return $conn;
}
?>