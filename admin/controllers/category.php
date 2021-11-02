<?php

    Class Category extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->categories= null; 
            $this->view->message= null;
        }

        function loadModels(){
            $this->loadModel('category');
        }

        function render(){
            if(isset($_GET['msj'])){
	            if($_GET['msj']=="agregar"){
	                $this->view->message="<div class='alert alert-success'>Agregada correctamente.</div>";
	            }elseif($_GET['msj']=="editar"){
	                $this->view->message="<div class='alert alert-success'>Editada correctamente.</div>";
	            }elseif($_GET['msj']=="eliminar"){
                    $this->view->message="<div class='alert alert-success'>Eliminado correctamente.</div>";
	            }
	        }
            $this->view->categories = allCategories(); 
            print_r($this->view->categories);
            $this->view->render('header_view');
            $this->view->render('category/list');
            $this->view->render('footer_view');
        }


        function add(){
            $this->view->render('header_view');
            $this->view->render('category/add');
            $this->view->render('footer_view');

        }

        function add_category_db(){
            $categoryName=$_POST['categoryName']; 
            echo putCategory($categoryName);

        }
    

    }


?>