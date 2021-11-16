<?php 
$producto = $this->product[0];
foreach($producto->imagenes as  $index=>$path){
    $imgProdExplode = explode("/",$path);
    $imgProd = end($imgProdExplode);
    $producto->imagenes[$index]=constant('URL')."admin/productImages/".$producto->idProducto.'/'.$imgProd;
}
$onClick="";
if(isset($_SESSION["ci"])){
    $idProducto =$producto->idProducto;
    $nombreProd=$producto->nombreProd;
    $descProd=$producto->descProd;
    $precioProd=$producto->precioProd;
    $stock=$producto->stock;
    $esActivoProd=$producto->esActivoProd;
    $categoriaProd=$producto->categoriaProd;
    $imagen = $producto->imagenes[0];
    $htmlStock ="";
    $htmlAction ="";
    $pathModal =$this->pagePath."modal";
    $imgProdExplode = explode("/",$imagen);
    $imgProd = end($imgProdExplode);
    $pathImg=constant('URL')."admin/productImages/".$idProducto.'/'.$imgProd;
    $ci = $_SESSION["ci"];
    $onClick='onclick=\'addToCart('.$idProducto.',"'.$nombreProd.'","'.$descProd.'",'.$precioProd.','.$stock.','.$ci.',"'.$pathImg.'");\'';
}

?>

<style>
    .only-one{
        width: 100%;
        height: 100%;
    }
</style>

<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                
                    <?php 
                        if(count($producto->imagenes)==1){?>
                        <div class="only-one">
                        <div class="only-one" style="display: flex;">
                        <div class="only-one">
                                <a class="popup-img venobox vbox-item only-one" href="<?=$producto->imagenes[0]?>" data-gall="myGallery">
                                    <img src="<?=$producto->imagenes[0]?>" class="only-one" alt="product image">
                                </a>
                            </div>

                    <?php }else{?>
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1" style="display: flex;">
                        
                                <?php foreach($producto->imagenes as  $index=>$p){?>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="<?=$p?>" data-gall="myGallery">
                                            <img src="<?=$p?>" alt="product image">
                                        </a>
                                    </div>
                                <?php }
                                if(count($producto->imagenes)<=3 && count($producto->imagenes)>1){?>
                                    <?php foreach($producto->imagenes as  $index=>$p){?>
                                        <div class="lg-image">
                                            <a class="popup-img venobox vbox-item" href="<?=$p?>" data-gall="myGallery">
                                                <img src="<?=$p?>" alt="product image">
                                            </a>
                                        </div>
                                <?php }
                                }
                    }?>
                        
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1" style="display: flex;">
                    <?php if(count($producto->imagenes)>1){
                         foreach($producto->imagenes as  $index=>$p){?>
                            <div class="sm-image">
                                <img src="<?=$p?>" alt="product image thumb">
                            </div>
                        <?php }
                        if(count($producto->imagenes)<=3){?>
                            <?php foreach($producto->imagenes as  $index=>$p){?>
                            <div class="sm-image">
                                <img src="<?=$p?>" alt="product image thumb">
                            </div>
                        <?php }
                        }
                    }?>
                        
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2><?=$producto->nombreProd?></h2>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">$<?=$producto->precioProd?></span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span><?=$producto->descProd?>
                                </span>
                            </p>
                        </div>
                        <?php if(isset($_SESSION["ci"])){?>
                        <div class="single-add-to-cart">
                            <form action="#" class="cart-quantity">
                                <button class="add-to-cart" <?=$onClick?> >Agregar al carro</button>
                            </form>
                        </div>
                        <?php }?>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Calidad garantizada</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Entrega en todo el país</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Si no está conforme le devolvemos el dinero</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<!-- content-wraper end -->


<script>
    $( document ).ready(function() {
        loadImages();
    });
    
</script>