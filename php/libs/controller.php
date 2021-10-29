<?php

class Controller{

    function __construct(){
        $this->view = new View();
    }
    function loadModel($model){
        $url = MODELS.$model.'.php';
        require_once $url;
    }

}

?>