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
            <span>£40 x 1</span>
        </div>
        <button class="close" onClick="removeItem(${productoid},${productoprecio});">
            <i class="fa fa-close"></i>
        </button>
    </li>`;
  }
}

customElements.define("product-cart", ProductCart);
