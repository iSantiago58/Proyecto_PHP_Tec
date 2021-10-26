
//Carro de compras

var addToCart; // Here's the difference
var loginUser; // Here's the difference
var registerUser; // Here's the difference


$(document).ready(function () {
  registerUser = function (cedula,password,usuarionombre){
    
  };





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

    var valueSubtotal = parseInt(span.text(), 10);
    valueSubtotal = valueSubtotal + productoprecio;
    span.text(valueSubtotal);
    var span1 = $(".cart-item-count");
    var value1 = parseInt(span1.text(), 10);
    value1 = value1 + 1;

    console.log("cat values" + value1);


    var priceOver = $(".item-text");
    priceOver.text(valueSubtotal);
    priceOver.append(`<span class="cart-item-count">${value1}</span>`);


    //cambia la cantidad de productos 

    var idnuevo = ".cantidad"+productoid;
    var cantProduct = $(idnuevo);
    console.log(cantProduct);
    var valueCant = parseInt(cantProduct.first().text(), 10);
    console.log(valueCant);

    valueCant = valueCant-1;
    if(valueCant == 0 ){
      cantProduct.text("vendido");
      cantProduct.addClass("stickersold").removeClass("sticker");
      let interactProduct = $(".interact"+productoid);
      $(".interact"+productoid).remove();

    }else{
      cantProduct.text(valueCant);
    }

    console.log("cantidad :"  +cantProduct.text() );


  };

  function js_categorias(){
    jQuery.ajax({
        type: "POST",
        url: "php/Categories.php",
        dataType: "json",
        data: { functionname: "getCategories" },
    }).success(function (data) {
        var categorias = data.categorias;
        var categoriaHtml;


        categorias.forEach((element) => {
          categoriaHtml =
            categoriaHtml +
            "<option value=" +
            element.idCategoria +
            ">" +
            element.nombre +
            "</option>";
        });
        $("#search_opt").insertAfter(categoriaHtml).last();
    });
  };
});
