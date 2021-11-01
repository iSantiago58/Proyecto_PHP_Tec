<section id="middle">
    <header id="page-header">
        <h1>Productos</h1>
    </header>
    <div id="content" class="padding-20">
        <?php if(isset($this->message)){
			print_r( $this->message);
		}?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive margin-bottom-30">
                    <div class="margin-bottom-10">
                        <a href="<?=PROJECT?>product/add" class="btn btn-primary">Agregar</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_sample">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col" class="text-center">Imagen</th>
                            <th scope="col">Activo</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($this->products!=null){
                                foreach($this->products as $product){
                                    $img=explode("/", $product->images['0'] );
                                    $imgName=$img[7];
                                    $imgPath=PROJECT.'productImages/'.$product->productId.'/'.$imgName;        
                                ?>
                                    <tr>
                                        <td><?=$product->productName?></td>
                                        <td><?=$product->productPrice?></td>
                                        <td><?=$product->productStock?></td>
                                        <td class="text-center">
                                            <img src="<?=$imgPath?>" style="width:100px">
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-primary">
                                                <input type="checkbox" <?php if($product->productActive==1){?>checked<?php }?> onclick="changeProductStatus()">
                                                <span class="switch-label" data-on="SI" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center"><a href="">Editar</a></td>
                                    
                                    </tr>
                               <?php }


                            } ?>
                    
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>