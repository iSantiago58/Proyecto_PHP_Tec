<?php 
    $pathLogo=constant('URL')."images/menu/logo/";
    
 ?>

<?php 
$buttonAdmin ="";
if(isset($_SESSION["ci"]) && !isset($this->nocarro)):
     $carData = json_encode($this->car);
     if($_SESSION["esAdmin"]==true){
        $buttonAdmin = '<li><a href="'.constant('URL').'admin" target="_blank" >Administración</a></li>';
     }
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            fillCart(<?php echo $carData?>,<?php echo $_SESSION["ci"]?>);
        });
    </script>
<?php endif;  ?>

<style>

.logo-empresa {
    max-width: 80%;
    max-height: 100%;
    margin-top: -20%;
    margin-bottom: -20%;
}
    </style>

<header class="li-header-4">
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img class="logo-empresa" src="<?php echo $pathLogo;?>2.gif" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <?php if(isset($_SESSION["ci"]) && !isset($this->nocarro)): ?>
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">0
                                        <span class="cart-item-count">0</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart" id="cart">
                                    <ul class="minicart-product-list " id="cart-content">
                                        
                                    </ul>
                                    <p class="minicart-total" id="cart-subtotal">SUBTOTAL: <span>0</span></p>
                                    <div class="minicart-button">
                                        <a href="<?php echo constant('URL')."perfil";?>"
                                            class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                            <span>Perfil</span>
                                        </a>
                                        <a href="<?php echo constant('URL');?>compra" class="li-button li-button-fullwidth li-button-sm">
                                            <span>Checkout</span>
                                        </a>
                                        
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
                <?php endif;  ?>
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="megamenu-holder"><a href="<?php echo constant('URL')."main";?>">Shop</a>
                                </li>

                                <li><a href="<?php echo constant('URL')."about";?>">Sobre nosotros</a></li>
                                <?=$buttonAdmin?>
                                <?php if(isset($_SESSION["ci"])): ?>
                                <li><a href="<?php echo $this->pagePath;?>Logout">Logout</a></li>
                                <?php else: ?>
                                <li><a href="<?php echo constant('URL')."login";?>">Login</a></li>
                                <?php endif;  ?>
                                
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->