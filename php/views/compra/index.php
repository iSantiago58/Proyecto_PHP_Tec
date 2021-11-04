<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="#">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Metodo de pago <span class="required">*</span></label>
                                    <select id="selectCountry" class="nice-select wide">
                                        <option data-display="pago">Uruguay</option>
                                        <option value="uk">Argentína</option>
                                        <option value="rou">Brazil</option>
                                        <option value="fr">Chile</option>
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
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity"> × 1</strong></td>
                                    <td class="cart-product-total"><span class="amount">£165.00</span></td>  
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity"> × 1</strong></td>
                                    <td class="cart-product-total"><span class="amount">£165.00</span></td>  
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">£215.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">£215.00</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            
                            <div class="order-button-payment">
                                <input value="Place order" type="submit" onClick="comprar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>