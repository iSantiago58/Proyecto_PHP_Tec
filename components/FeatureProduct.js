class FeatureProduct extends HTMLElement {
  connectedCallback() {
    var name = this.attributes.name.value;
    var price = this.attributes.price.value;
    var imgpath = this.attributes.imgpath.value;

    this.innerHTML = `<div class="row">
                            <div class="group-featured-pro-wrapper">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img alt="" src="images/${imgpath}">
                                    </a>
                                </div>
                                <div class="featured-pro-content">
                                    <div class="product-review">
                                        <h5 class="manufacturer">
                                            <a href="product-details.html">${name}</a>
                                        </h5>
                                    </div>
                                    <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                    <div class="featured-price-box">
                                        <span class="new-price">$${price}</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
  }
}

customElements.define("feature-product", FeatureProduct);
