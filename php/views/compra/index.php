
<style>

.isa_error {
    color: #D8000C;
    background-color: #FFD2D2;
}

</style>

<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="#">
                    <div class="checkbox-form">
                        <h3>Detalles de compra</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Metodo de pago <span class="required">*</span></label>
                                    <select id="selectPago" class="nice-select wide">
                                        <?php foreach($this->metodospagos as $pago){?>
                                        <option value="<?=$pago->mediodepagoid?>"><?=$pago->mediodepagonombre?></option>

                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Direccion de envío</label>
                                    <input id="direccion_envio" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Direccion de facturación <span class="required">*</span></label>
                                    <input id="direccion_facturacion" placeholder="Calles" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Orden de compra</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Producto</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total =0;
                                foreach($this->car as $item){ ?>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> <?=$item['productonombre']?><strong class="product-quantity"> × <?=$item['cantidad']?></strong></td>
                                    <td class="cart-product-total"><span class="amount">$ <?=$item['precio']*$item['cantidad']?></span></td>  
                                </tr>

                                <?php 
                                $total=$total+($item['precio']*$item['cantidad']);
                                }?>
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span id="total" class="amount" value="<?=$total?>">$<?=$total?></span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            
                            <div class="order-button-payment">
                                <input class="button" value="Place order" type="submit" onClick="verify();">
                            </div>
                            <div class="isa_error"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>



<script>
    function verify(){
        if($('#selectPago').val() != '' && $('#direccion_envio').val() != ''  && $('#direccion_facturacion').val() != '' )
        {
            if(<?=count($this->car)?> != 0){
                $('.isa_error').html("");
                comprar('<?=$_SESSION['ci']?>',$("#selectPago").val(),$("#direccion_envio").val(),$("#direccion_facturacion").val(),<?=$total?>);
            }else{
                $('.isa_error').html("Debe comprar al menos 1 producto");
            }

        }else{
            console.log("hola");
            $('.isa_error').html("Debe completar todos los campos obligatorios");
        }
    }
 
</script>