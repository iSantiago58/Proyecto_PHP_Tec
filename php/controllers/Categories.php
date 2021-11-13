<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/models/Categories.php");

    
    Class Categories extends Controller{

        function __construct(){ 
            parent::__construct();
            $controller->loadModel('categories');

        }
        function render(){
            $this->view->render('header_view');
            $this->view->render('home_view');
            $this->view->render('footer_view');
        }

    }
?>