<?php
    session_start();
    Class Main extends Controller{

        function __construct(){ 
            parent::__construct();
        }

        function render(){
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('main/index');
            $this->view->render('footer_view');
        }

        function loadModels(){
            $this->loadModel('categories');
            $this->loadModel('products');
        }
        function logOut(){
            session_destroy();
            header( "Location: ".URL."Login");
        }

    }
?>