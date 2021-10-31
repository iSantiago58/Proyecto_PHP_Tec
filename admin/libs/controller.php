<?php

class Controller{

    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
       $url =  BASE_URL.'models/'.$model.'_model.php';
       require $url;

    }


}

?>