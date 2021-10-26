<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Proyecto_php_tec/php/Categories.php");
$list_categories = get_categories();

$htmlCategories="";

foreach($list_categories as $clave => $c){
     $products = "";

    for ($index = 0+($clave*4); $index < 4+(4*$clave); $index++) {
        $productoid = $index;
        $productodescripcion = "es un producto";
        $productoprecio = 233;
        $stock = $index;

        $categoriaid = 3;
        $productonombre = "nuevo producto";

        $soldout ="";
        $interact ="";
        if($stock== 0){
            $soldout = '<span class="stickersold">Vendido</span>';
        }else{
            $soldout = <<<term
            <span id="cant_$productoid" class="sticker $clave cantidad$productoid">$stock</span>';
            term;
            $interact = <<<term
                <div class="add-actions interact$productoid">
                    <ul class="add-actions-link interaction_link$productoid">
                        <li class="add-cart active" onclick="addToCart($productoid,'$productonombre','$productodescripcion',$productoprecio,$stock,$categoriaid);"><a >Add to cart</a></li>
                        <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i
                                    class="fa fa-eye"></i></a></li>
                    </ul>
                </div>
            term;

        }

        $product = <<<term
        <div class="col-lg-12">
        <div class="single-product-wrap">
            <div class="product-image">
                <a href="single-product.html">
                    <img src="images/product/large-size/1.jpg" alt="Li's Product Image">
                </a>
                $soldout
            </div>
            <div class="product_desc">
                <div class="product_desc_info">
                    <h4><a class="product_name" href="single-product.html">$productonombre</a>
                    </h4>
                    <div class="price-box">
                        <span class="new-price">$$productoprecio
                        </span>
                    </div>
                </div>
                $interact
            </div>
        </div>
        </div>
        term;
        $products = $products.$product;
    }

    $htmlCategories = $htmlCategories.<<<term
    <div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>$c->nombre</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        $products
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    term;
}


echo $htmlCategories;
?>

