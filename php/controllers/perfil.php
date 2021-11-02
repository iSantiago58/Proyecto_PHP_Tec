<?php
    session_start();
    Class perfil extends Controller{

        function __construct(){ 
            parent::__construct();

        }

        function render(){

            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('perfil/index');
            $this->view->render('footer_view');

        }

        function loadModels(){
            $this->loadModel('users');
            $this->loadModel('orders');

        }

        function logOut(){
            session_destroy();
            header( "Location: ".URL."Login");
        }

    }
?>