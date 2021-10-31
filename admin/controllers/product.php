<?php

    Class Product extends Controller{

        function __construct(){ 
            parent::__construct();
           
        }

        function render(){
            $this->view->render('header_view');
            $this->view->render('product/list');
            $this->view->render('footer_view');
        }

        function getAll(){
            $this->model->getAll();

        }

        function add(){
            $this->view->render('header_view');
            $this->view->render('product/add');
            $this->view->render('footer_view');

        }


        public function uploadPhotoTmp($orden, $id=""){
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
                    $ruta="imgTemp/propiedad";
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
    

    }


?>