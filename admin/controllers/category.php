<?php

    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/admin/models/category_model.php");

    Class Category extends Controller{

        function __construct(){ 
            parent::__construct();
           $controller->loadModel('category');
        
           
        }

        function render(){
            $this->view->render('header_view');
           // $this->view->categories=$this->getAll();
           
            
            $this->view->render('category/list');
            $this->view->render('footer_view');
        }

        function getAll(){
           return allCategories();

        }

        function add(){
            $this->view->render('header_view');
            $this->view->render('category/add');
            $this->view->render('footer_view');

        }
    

    }


?>