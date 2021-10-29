var removeItem; // Here's the difference

function ProductCartLogic() {
  $(document).ready(function () {
    //carro

    removeItem = function (productoid, precio) {
      console.log("intenta remover algo");
      var nameId = "#cart-content-" + productoid;
      $(nameId).remove();
      console.log("remueve " + nameId);
      var span = $("#cart-subtotal > span");
      console.log(span);
      console.log(span.text());

      var value = parseInt(span.text(), 10);
      value = value - precio;
      span.text(value);
      var span1 = $(".cart-item-count");
      var value1 = parseInt(span1.text(), 10);
      value1 = value1 - 1;
      span1.text(value1);
      var priceOver = $(".item-text");
      var valuePriceOver = parseInt(priceOver.text(), 10);
      valuePriceOver = valuePriceOver - precio;
      priceOver.text(valuePriceOver);


      var idnuevo = ".cantidad" + productoid;
      var cantProduct = $(idnuevo);
      console.log(cantProduct);
      if (cantProduct.first().text() == "vendido") {
        cantProduct.text(1);
        cantProduct.addClass("sticker").removeClass("stickersold");

        let htmlInteraction = '<ul class="add-actions-link interaction_link' + productoid + '">' +
          '<li class="add-cart active" onclick="addToCart(' + productoid + ',"' + productonombre + '"}","' + productodescripcion + '",' + productoprecio + ',' + stock + ',' + categoriaid + ');"><a >Add to cart</a></li>' +
          '<li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>' +
          '<li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i' +
          'class="fa fa-eye"></i></a></li>' +
          '</ul>';
        let interactProduct = $(".interact" + productoid).append('');
        $(".interact" + productoid).remove();

      }
      var valueCant = parseInt(cantProduct.first().text(), 10);
      console.log(valueCant);

      valueCant = valueCant - 1;
      if (valueCant == 0) {
        cantProduct.text("vendido");
        cantProduct.addClass("stickersold").removeClass("sticker");
        let interactProduct = $(".interact" + productoid);
        $(".interact" + productoid).remove();

      } else {
        cantProduct.text(valueCant);
      }

      console.log("cantidad :" + cantProduct.text());






    };
  });
}

class ProductCart extends HTMLElement {
  connectedCallback() {
    ProductCartLogic();
    console.log(this.attributes.productoid);
    if (this.attributes.productoid !== "undefined") {
      var productoid = this.attributes.productoid.value;
      var productonombre = this.attributes.productonombre.value;
      var productodescripcion = this.attributes.productodescripcion.value;
      var productoprecio = this.attributes.productoprecio.value;
      var stock = this.attributes.stock.value;
      var categoriaid = this.attributes.categoriaid.value;
    }

    this.innerHTML = `
    <li id="cart-content-${productoid}">
        <a href="single-product.html" class="minicart-product-image">
            <img class ="cart-list-item" src="images/product/small-size/1.jpg" alt="cart products">
        </a>
        <div class="minicart-product-details">
            <h6><a href="single-product.html">${productonombre}</a></h6>
            <span>$ ${productoprecio}</span>
        </div>
        <button class="close" onClick="removeItem(${productoid},${productoprecio});">
            <i class="fa fa-close"></i>
        </button>
    </li>`;
  }
}

customElements.define("product-cart", ProductCart);
