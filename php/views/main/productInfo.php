<?php 
$pathImg=constant('URL')."images/product/large-size/";
$urlMain=  constant('URL') . 'main/'; 

?>

<div class="modal show modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close" href="<?php echo $urlMain;?>" >
                        <span aria-hidden="true">&times;</span>
</a>
                    <div class="modal-inner-area row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1 order-photos">
                                    <div class="lg-image">
                                        <img src="<?php echo $pathImg;?>1.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="<? echo $pathImg?>2.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="<? echo $pathImg?>3.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="<? echo $pathImg?>4.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="<? echo $pathImg?>5.jpg" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="<? echo $pathImg?>6.jpg" alt="product image">
                                    </div>
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">
                                    <div class="sm-image"><img src="images/product/small-size/1.jpg"
                                            alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/2.jpg"
                                            alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/3.jpg"
                                            alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/4.jpg"
                                            alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/5.jpg"
                                            alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/6.jpg"
                                            alt="product image thumb"></div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2><?php echo $this->nameProduct; ?></h2>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">$57.98</span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span>100% cotton double printed dress. Black and white striped top and orange
                                                high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum
                                                accusamus similique eveniet quia pariatur.
                                            </span>
                                        </p>
                                    </div>
                                    <div class="product-variants">
                                        <div class="produt-variants-size">
                                            <label>Dimension</label>
                                            <select class="nice-select">
                                                <option value="1" title="S" selected="selected">40x60cm</option>
                                                <option value="2" title="M">60x90cm</option>
                                                <option value="3" title="L">80x120cm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-add-to-cart">
                                        <form action="#" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>