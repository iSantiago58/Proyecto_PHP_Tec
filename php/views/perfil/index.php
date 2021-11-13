    
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Perfil de usuario
            </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <p><b>Cédula:</b></p>
                    </div>
                    <div class="col">
                        <p><?php echo $this->user->cedula?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <p><b>Usuario:</b></p>
                    </div>
                    <div class="col">
                        <p><?php echo $this->user->usuarionombre?> </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Historial de compra
            </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <?php if(!empty($this->orders)){?>
                    <div class="row">
                        <?php foreach($this->orders as $order){?>
                            <div class="col-6">
                                <div class="your-order" style="margin-bottom: 20px;">
                                <div class="row">
                                    <div class="col-8">
                                     <h4>Compra #<?php echo $order['pedidoid']?></h4>
                                    </div>
                                    <div class="col">
                                        <h4>Total $<?php echo $order['importetotal']?></h4>
                                    </div>
                                    </div>
                                    
                                    <div class="your-order-table table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="cart-product-name">Producto</th>
                                                    <th class="cart-product-total">Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php                                                 
                                                foreach($order['productos'] as $prod){?>
                                                    <tr class="cart_item">
                                                        <td class="cart-product-name"><?=$prod['productonombre']?> <strong class="product-quantity"> × <?=$prod['cantidad']?></strong></td>
                                                        <td class="cart-product-total"><span class="amount"><?=$prod['precio']?></span></td>  
                                                    </tr>
                                                <?php }?>
                                                <td>
                                                    <?php if(!empty($order['feedback'])){?>
                                                        <h5>Comentario</h5>
                                                        <p><?=$order['feedback']?></p>
                                                    <?php  }else{?>
                                                        <textarea id="revew_<?=$order['pedidoid']?>" rows="4" placeholder="Escribe aquí tus comentarios"></textarea>
                                                        <div id="btn-comentario_<?=$order['pedidoid']?>">
                                                            <a href="javascript:sendReview(<?=$order['pedidoid']?>)" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                                <span>Enviar</span>
                                                            </a>
                                                        </div>
                                                    <?php }?>
                                                    <div id='errorSendReview_<?=$order['pedidoid']?>'></div>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <?php }?>
               
            </div>
        </div>
    </div>
</div>