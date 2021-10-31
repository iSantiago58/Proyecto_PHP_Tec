<?php

class Controller{

    function __construct(){
        $this->view = new View();
    }
    function loadModel($model){
        $url = MODELS.$model.'.php';
        if(file_exists($url)){
            require $url;
        }
    }

}

?>