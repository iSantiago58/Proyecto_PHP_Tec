if (addToCart == null) {
  var addToCart; // Here's the difference
  function ProductLogic() {
    $(document).ready(function () {
      //carro

      addToCart = function (
        productoid,
        productonombre,
        productodescripcion,
        productoprecio,
        stock,
        categoriaid
      ) {
        console.log("intenta agregar algo ");
        var $newItem = $(`<product-cart 
            productoid=${productoid}
            productonombre=${productonombre}
            productodescripcion=${productodescripcion}
            productoprecio=${productoprecio}
            stock=${stock}
            categoriaid=${categoriaid}></product-cart>`);
        $("#cart-content").append($newItem);
        var span = $("#cart-subtotal > span");
        console.log(span);
        console.log(span.text());

        var value = parseInt(span.text(), 10);
        value = value + productoprecio;
        span.text(value);
        var span1 = $(".cart-item-count");
        var value1 = parseInt(span1.text(), 10);
        value1 = value1 + 1;

        console.log("cat values" + value1);

        var priceOver = $(".item-text");
        priceOver.text(value);
        priceOver.append(`<span class="cart-item-count">${value1}</span>`);
      };
    });
  }
}

class Product extends HTMLElement {
  connectedCallback() {
    if (this.attributes.productoid != null) {
      var productoid = this.attributes.productoid.value;
      var productonombre = this.attributes.productonombre.value;
      var productodescripcion = this.attributes.productodescripcion.value;
      var productoprecio = this.attributes.productoprecio.value;
      var stock = this.attributes.stock.value;
      var categoriaid = this.attributes.categoriaid.value;
    }
    console.log(
      `"addToCart(${productoid} ,"${productonombre}" ,"${productodescripcion}" ,${productoprecio},${stock},${categoriaid})"`
    );
    ProductLogic();
    this.innerHTML = `<div class="single-product-wrap">
    <div class="product-image">
        <a href="single-product.html">
            <img src="images/product/large-size/1.jpg" alt="Li's Product Image">
        </a>
        <span class="sticker">New</span>
    </div>
    <div class="product_desc">
        <div class="product_desc_info">
            <h4><a class="product_name" href="single-product.html">${productonombre}</a>
            </h4>
            <div class="price-box">
                <span class="new-price">$${productoprecio}</span>
            </div>
        </div>
        <div class="add-actions">
            <ul class="add-actions-link">
                <li class="add-cart active" onclick="addToCart(${productoid},'${productonombre}','${productodescripcion}',${productoprecio},${stock},${categoriaid});"><a href="#">Add to cart</a></li>
                <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i
                            class="fa fa-eye"></i></a></li>
            </ul>
        </div>
    </div>
</div>`;
  }
}

customElements.define("product-i", Product);
