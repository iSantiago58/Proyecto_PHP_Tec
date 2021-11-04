<?php 
$pathImg=constant('URL')."images/product/large-size/";
$urlMain=  constant('URL') . 'main/'; 
?>
<div class="modal show modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close" href="<?php echo $urlMain;?>" >
                        <span aria-hidden="true">&times;</span></a>
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
                                    <h2><?php echo $this->producto->nombreProd;; ?></h2>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">$<?php echo $this->producto->precioProd; ?></span>
                                    </div>
                                    <?php if($this->producto->descProd != "null"):?>
                                    <div class="product-desc">
                                        <p>
                                            <span><?php echo $this->producto->descProd; ?></span>
                                        </p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>