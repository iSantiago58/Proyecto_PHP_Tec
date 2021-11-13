<?php
    session_start();
    Class about extends Controller{
        function __construct(){ 
            parent::__construct();
            $this->view->mensaje = "";
            $this->view->pagePath = constant('URL')."login/";
            $this->view->car=[];

        }
        function render(){
            if(isset($_SESSION["ci"])){
                $this->view->car = getCartProducts($_SESSION["ci"]);
            }
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('about/index');
            $this->view->render('footer_view');            
        }

        function loadModels(){
            $this->loadModel('Orders');

        }

        function goToMain(){
            header( "Location: ".URL."main");

        }
        function logOut(){
            session_destroy();
            header( "Location: ".URL."Login");
        }
    }
?>