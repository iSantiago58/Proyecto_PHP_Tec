<section id="middle">
    <header id="page-header">
        <h1>Editar Producto</h1>
    </header>
    <form onsubmit="return editProduct()">
        <div id="content" class="padding-20">
            <input type="hidden" value="<?=$this->products->productId?>" id="productId"/>
            <div class="row">
                <div class="col-sm-6 col-md-offset-1">
                    <label><b>Nombre *</b></label>
                    <input id="productName" type="text" class="form-control" value="<?=$this->products->productName?>">
                </div>

                <div class="col-sm-3">
                    <label><b>Categoria *</b></label>
                    <select  id="productCategory" class="form-control pointer">
                        <?php
                         if(!empty($this->categories)){
                            foreach($this->categories as $category) {?>
                                <option <?php if($category->categoriaId == $this->products->categoryId){?>selected <?php }?> value="<?=$category->categoriaId?>"><?=$category->categoriaNombre?></option>
                                <?php }}?>
                    </select>
                </div>       
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-offset-1">
                    <label><b>Precio *</b></label>
                    <input id="productPrice" type="text" class="form-control" value="<?=$this->products->productPrice?>">
                </div>

                <div class="col-sm-3">
                    <label><b>Stock *</b></label>
                    <input id="productStock" type="text" class="form-control" value="<?=$this->products->productStock?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 col-md-offset-1">
                    <label><b>Descripción *</b></label>
                    <textarea class="summernote form-control" data-height="200" data-lang="es-ES" id ="productDescription" rows="8"><?=$this->products->productDescription?></textarea>
                </div>
            </div>

            <div class="row">
                <?php for($i=1; $i<=4; $i++){?>
                    <div class="<?php if($i==1 or $i==3){?>col-sm-5 col-md-offset-1 <?php }else{?> col-sm-5 <?php }?> ">
                        <label>Imagen <?=$i?></label>
                        <div class="slim" data-service="<?=PROJECT?>product/uploadPhotoTmp/<?=$i?>" data-max-file-size="10" data-button-edit-label="Editar" data-button-remove-label="Borrar"
                             data-button-upload-label="Guardar" data-button-cancel-label="Cancelar" data-button-confirm-label="Confirmar"
                             data-button-edit-title="Editar" data-button-remove-title="Borrar" data-button-upload-title="Guardar" data-button-cancel-title="Cancelar" data-button-confirm-title="Confirmar"
                             data-status-upload-success="Imagen guardada." data-did-upload="hiddenField" data-did-remove="removePhotoOnEdit" data-push="true"
                            data-ratio="1:1" data-force-type="jpeg">
                            <input type="file" name="productPhoto[]" value="<?php if(isset($this->products->images[$i-1]) && !empty($this->products->images[$i-1])){echo  $this->products->images[$i-1];}?>">
                            <?php if(isset($this->products->images[$i-1]) && !empty($this->products->images[$i-1])){
                                 $img=explode("/", $this->products->images[$i-1] );
                                 $imgName=$img[7];
                                 $imgPath=IMG_URL.$this->products->productId.'/'.$imgName;    
                                ?>
                                <img src="<?=$imgPath?>" >
                            <?php }?>
                        </div>
                        <input name="<?php if(isset($this->products->images[$i-1]) && !empty($this->products->images[$i-1])){echo  $imgName;}?>" type="hidden" id="uploadProductPhoto<?=$i-1?>" value="<?php if(isset($this->products->images[$i-1]) && !empty($this->products->images[$i-1])){echo  $this->products->images[$i-1];}?>">
                        <input type="hidden" name="editPhoto[]" value="<?php if(isset($this->products->images[$i-1]) && !empty($this->products->images[$i-1])){echo  $this->products->images[$i-1];}else{ echo '';}?>">
                    </div>
                <?php }?>
            </div>

            <div id="errorEditProduct"></div>
            <div class="row">
                <div class="col-sm-6">
                    <footer>
                        <button id="btn-edit-product" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Guardar</button>
                    </footer>
                </div>
            </div>
        </div>
    </form>
</section>