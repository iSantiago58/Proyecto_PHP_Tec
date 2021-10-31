<?php

class Controller{

    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
       $url = MODELS.$model.'_model.php';
       if(file_exists($url)){
            require $url;
        }
    }


}

?>