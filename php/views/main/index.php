<?php
$categorias = $this->categories;
$productos = $this->products;
$htmlContent ="";
$products = "";
$htmlArrayProduct= array();
foreach($productos as $key => $p){
    $idProducto =$p->idProducto;
    $nombreProd=$p->nombreProd;
    $descProd=$p->descProd;
    $precioProd=$p->precioProd;
    $stock=$p->stock;
    $esActivoProd=$p->esActivoProd;
    $categoriaProd=$p->categoriaProd;
    $imagen = $p->imagenes;

    $htmlStock ="";
    $htmlAction ="";
    $pathModal =$this->pagePath."modal";
    if($stock==0 ){
        $htmlStock =<<<term
        <span class="stickersold cantidad${idProducto}">${stock}</span>
        term;
        $htmlAction='';
    }else{
        $htmlStock =<<<term
        <span class="sticker cantidad${idProducto}">${stock}</span>
        term;

        $urlFillCart=  constant('URL') . 'main/fillCar/'; 
        $urlModaCart=  constant('URL') . 'main/modal/'.$idProducto; 

        $htmlAction=<<<term
        <div class="add-actions interact${idProducto}">
                <ul class="add-actions-link">
        term;

        if(isset($_SESSION["ci"])){
            $ci = $_SESSION["ci"];
            $htmlAction=$htmlAction . <<<term
            <li class="add-cart active" onclick="addToCart(${idProducto},'${nombreProd}','${descProd}',${precioProd},${stock},${ci},${categoriaProd});">
            <a>Add to cart</a></li>
            term;

        }
        $htmlAction=$htmlAction . <<<term
                    <li><a class="quick-view" href="${urlModaCart}"><i class="fa fa-eye"></i></a></li>
                </ul>
            </div>
        term;
        
    }
    $imgProdExplode = explode("/",$imagen);
    $imgProd = end($imgProdExplode);
    $pathImg=constant('URL')."admin/productImages/".$idProducto.'/'.$imgProd;
    $htmlProduct =<<<term
    <div class="single-product-wrap">
    <div class="product-image">
            <a href="single-product.html">
                <img src="${pathImg}" alt="Li's Product Image">
            </a>
            ${htmlStock}
        </div>
        <div class="product_desc">
            <div class="product_desc_info">
                <h4><a class="product_name" href="single-product.html">${nombreProd}</a>
                </h4>
                <div class="price-box">
                    <span class="new-price">$${precioProd}</span>
                </div>
            </div>
            ${htmlAction}  
        </div>
    </div>
    term;
    if(array_key_exists($categoriaProd,$htmlArrayProduct)){
        $htmlArrayProduct[$categoriaProd] = $htmlArrayProduct[$categoriaProd].$htmlProduct;
    }else{
        $htmlArrayProduct[$categoriaProd] = $htmlProduct;
    }
}


foreach ($categorias as $key => $value) {
    $catName =$value->nombre;
    $htmlProd="";
    if(array_key_exists($value->idCategoria,$htmlArrayProduct)){
        $htmlProd =$htmlArrayProduct[$value->idCategoria];
    }
    $htmlCategory="";
    if($htmlProd!=""){
    $htmlCategory = <<<term
    <div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>${catName}</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        ${htmlProd}
                    </div>
                </div>
            </div>
        </div>
    </div>
    term;
    }
    
    $htmlContent =$htmlContent.$htmlCategory;
}


echo $htmlContent;
?>
