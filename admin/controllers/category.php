<?php

    Class Category extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->categories= null; 
            $this->view->message= null;
            $this->view->place=null;
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
            $this->view->place="categories";
            $this->view->render('header_view');
            $this->view->render('category/list');
            $this->view->render('footer_view');
        }


        function add(){
            $this->view->place="categories";
            $this->view->render('header_view');
            $this->view->render('category/add');
            $this->view->render('footer_view');

        }

        function add_category_db(){
            $categoryName=$_POST['categoryName']; 
            echo putCategory($categoryName);

        }

        function edit($id){
            $this->view->category=getCategoryById($id[0]);
            $this->view->place="categories";
            $this->view->render('header_view');
            $this->view->render('category/edit');
            $this->view->render('footer_view');
        }

        function edit_category_db(){
            $categoryName = $_POST['categoryName'];
            $categoryId = $_POST['categoryId'];
            echo editCategoty($categoryId,$categoryName);
        }
    

    }


?>