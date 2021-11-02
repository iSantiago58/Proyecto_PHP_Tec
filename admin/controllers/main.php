<?php

    Class Main extends Controller{

        function __construct(){ 
            parent::__construct();
           
        }

        function render(){
            $this->view->render('header_view');
            $this->view->render('index');
            $this->view->render('footer_view');
        }

        function loadModels(){
            $this->loadModel('category');
        }

    }


?>