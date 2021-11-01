<?php

    Class Product extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->categories = null;
            $this->view->message=null;
            $this->view->products=null;
        }

        function loadModels(){
            $this->loadModel('product');
            $this->loadModel('category');
        }

        function render(){
            if(isset($_GET['msj'])){
	            if($_GET['msj']=="agregar"){
	                $this->view->message="<div class='alert alert-success'>Agregado correctamente.</div>";
	            }elseif($_GET['msj']=="editar"){
	                $this->view->message="<div class='alert alert-success'>Editado correctamente.</div>";
	            }elseif($_GET['msj']=="eliminar"){
                    $this->view->message="<div class='alert alert-success'>Eliminado correctamente.</div>";
	            }
	        }
            $this->view->products=allProducts();
            $this->view->render('header_view');
            $this->view->render('product/list');
            $this->view->render('footer_view');
        }

        function add(){
            $this->view->categories= allCategories();
            $this->view->render('header_view');
            $this->view->render('product/add');
            $this->view->render('footer_view');

        }


        function uploadPhotoTmp($orden, $id=""){
            // if(isset($_SESSION['usr_adm_login'])){
                require_once('inc/slim.php');
                try{
                    $images=Slim::getImages("productPhoto");
                }catch(Exception $e){
                    Slim::outputJSON(array(
                        'status'=>SlimStatus::FAILURE,
                        'message'=>'Unknown'
                    ));
                }
                if($images===false){
                    Slim::outputJSON(array(
                        'status'=>SlimStatus::FAILURE,
                        'message'=>'No data posted'
                    ));
                }
                $image=array_shift($images);
                if(!isset($image)){
                    Slim::outputJSON(array(
                        'status'=>SlimStatus::FAILURE,
                        'message'=>'No images found'
                    ));
                }
                // if we've received output data save as file
                if(isset($image['output']['data'])){
                    if(!file_exists('imgTemp')){
                        mkdir('imgTemp');
                    }
                    $name=trim($image['output']['name']);
                    $nombrebase=explode(".",$name);
                    $nombrebase=$nombrebase[0];
                    $extension=substr($image['output']['type'],6);
                    $name=$nombrebase.".".$extension;
                    $contador=0;
                    if($id!=""){
                        while(file_exists('productImages/'.$id.'/'.$name)){
                            $name=$nombrebase."_".$contador.".".$extension;
                            $contador++;
                        }
                    }else{
                        while(file_exists('productImages/'.$name)){
                            $name=$nombrebase."_".$contador.".".$extension;
                            $contador++;
                        }
                    }
                    $contador=0;
                    while(file_exists('imgTemp/'.$name)){
                        $name=$nombrebase."_".$contador.".".$extension;
                        $contador++;
                    }
                    $ruta="imgTemp/";
                    // get the crop data for the output image
                    $data=$image['output']['data'];
                    $output=Slim::saveFile($data, $name, $ruta, false);
                }else{
                    Slim::outputJSON(array(
                        'status'=>SlimStatus::FAILURE,
                        'message'=>json_encode($image)
                    ));
                }
                // Build response to client
                $response=array(
                    'status'=>SlimStatus::SUCCESS,
                    'orden'=> $orden
                );
                if(isset($output) && isset($input)){
                    $response['output']=array(
                        'file'=>$output['name'],
                        'path'=>$output['path']
                    );
                    $response['input']=array(
                        'file'=>$input['name'],
                        'path'=>$input['path']
                    );
                }else{
                    $response['file']=isset($output)?$output['name']:$input['name'];
                    $response['path']=isset($output)?$output['path']:$input['path'];
                }
                // Return results as JSON String
                Slim::outputJSON($response);
            // }else{
            //     redirect(base_url());
            // }
        }


        function add_product_db(){
            $productName=$_POST['productName']; 
            $productCategory=$_POST['productCategory']; 
            $productPrice=$_POST['productPrice']; 
            $productStock=$_POST['productStock']; 
            $productDescription=$_POST['productDescription']; 
            $imagesArray=$_POST['imagesArray']; 
            print_r(putProduct($productName,$productCategory,$productPrice,$productStock,$productDescription,$imagesArray));
        }

    }


?>