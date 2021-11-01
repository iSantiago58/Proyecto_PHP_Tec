<?php

    Class User extends Controller{

        function __construct(){ 
            parent::__construct();
           
        }

        function render(){
            $this->view->render('header_view');
            $this->view->render('user/list');
            $this->view->render('footer_view');
        }

        function getAll(){
            $this->model->getAll();

        }

        function add(){
            $this->view->render('header_view');
            $this->view->render('user/add');
            $this->view->render('footer_view');

        }
    

    }


?>