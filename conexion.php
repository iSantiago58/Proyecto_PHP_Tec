<?php 
    $url = "localhost";
    $user = "admin";
    $pass = "admin";
    $database = "proyecto_php_tec";
    $mysqli = new mysqli($url, $user, $pass, $database);

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>