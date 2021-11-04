<?php
    session_start();
    Class about extends Controller{
        function __construct(){ 
            parent::__construct();
            $this->view->mensaje = "";
            $this->view->pagePath = constant('URL')."login/";
        }
        function render(){
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('about/index');
            $this->view->render('footer_view');            
        }

        function loadModels(){
        }

        function goToMain(){
            header( "Location: ".URL."main");

        }
    }
?>