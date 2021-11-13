
//Carro de compras

var addToCart; // Here's the difference
var removeItem;
var loginUser; // Here's the difference
var registerUser; // Here's the difference
var comprar;
var fillCart;

var PATH = "http://" + location.host + "/proyecto_php_tec/";

$(document).ready(function () {
  fillCart = function (cart, ci) {
    cart.forEach(product => {
      var productoprecio = product["precio"];
      var productoid = product["productoid"];
      var productonombre = product["productonombre"];
      var cantidad = product["cantidad"];
      var productodescripcion = product["productodescripcion"];
      var sumaPrecio = cantidad * productoprecio;
      var rutaImagen = product['imagen'].split('/').pop();
      var rutaCompleta = PATH + 'admin/productImages/' + productoid + '/' + rutaImagen;
      var $newItem = $(`
      <li id="cart-content-${productoid}" class="cart-count-item">
          <a class="minicart-product-image">
              <img class ="cart-list-item" src="${rutaCompleta}" alt="cart products">
          </a>
          <div class="minicart-product-details">
              <h6><a >${productonombre} x ${cantidad}</a></h6>
              <span>${sumaPrecio}</span>
          </div>
          <button class="close" onClick="removeItem(${productoid},'${productonombre}','${productodescripcion}',${productoprecio},${cantidad},'${ci}','${rutaCompleta}');">
              <i class="fa fa-close"></i>
          </button>
      </li>`);
      $("#cart-content").append($newItem);
      var span = $("#cart-subtotal > span");
      var valueSubtotal = parseInt(span.text(), 10);
      valueSubtotal = valueSubtotal + sumaPrecio;
      span.text(valueSubtotal);
      var span1 = $(".cart-item-count");
      var value1 = parseInt(span1.text(), 10);
      value1 = value1 + 1;
      var priceOver = $(".item-text");
      priceOver.text(valueSubtotal);
      priceOver.append(`<span class="cart-item-count">${value1}</span>`);
      //cambia la cantidad de productos 
      var idnuevo = ".cantidad" + productoid;
      var cantProduct = $(idnuevo);
      var valueCant = parseInt(cantProduct.first().text(), 10);
      valueCant = valueCant - 1;
      if (valueCant == 0) {
        cantProduct.text("vendido");
        cantProduct.addClass("stickersold").removeClass("sticker");
        $(".interact" + productoid).remove();
      } else {
        cantProduct.text(valueCant);
      }

    });
  };

  //carro
  addToCart = function (
    productoid,
    productonombre,
    productodescripcion,
    productoprecio,
    stock,
    ci,
    imagePath
  ) {
    var urlAjax = PATH + 'includes/ajaxFunctions.php';
    var dataJson = {
      "addToCart": "set",
      "ci": ci,
      "precio": productoprecio,
      "idProduct": productoid,
    };
    $.ajax({
      url: urlAjax,
      type: 'post',
      dataType: "json",
      data: dataJson,
      success: function (response) {
        console.log(response);
        var cant = response['cantidad'];
        $("#cart-content-" + productoid).remove();
        var $newItem = $(`
        <li id="cart-content-${productoid}" class="cart-count-item">
            <a  class="minicart-product-image">
                <img class ="cart-list-item" src="${imagePath}" alt="cart products">
            </a>
            <div class="minicart-product-details">
                <h6><a>${productonombre} x ${cant}</a></h6>
                <span>$ ${productoprecio}</span>
            </div>
            <button class="close" onClick="removeItem(${productoid},'${productonombre}','${productodescripcion}',${productoprecio},${stock},'${ci}','${imagePath}');">
                <i class="fa fa-close"></i>
            </button>
        </li>`);
        $("#cart-content").append($newItem);
        var span = $("#cart-subtotal > span");
        var valueSubtotal = parseInt(span.text(), 10);
        valueSubtotal = valueSubtotal + productoprecio;
        span.text(valueSubtotal);
        var span1 = $(".cart-count-item");
        var value1 = span1.length;
        var priceOver = $(".item-text");
        priceOver.text(valueSubtotal);
        priceOver.append(`<span class="cart-item-count">${value1}</span>`);
        //cambia la cantidad de productos 
        var idnuevo = ".cantidad" + productoid;
        var cantProduct = $(idnuevo);
        var valueCant = parseInt(cantProduct.first().text(), 10);
        valueCant = valueCant - 1;
        if (valueCant == 0) {
          cantProduct.text("vendido");
          cantProduct.addClass("stickersold").removeClass("sticker");
          $(".interact" + productoid).remove();
        } else {
          cantProduct.text(valueCant);
        }
      }
    },
    );
  };

  removeItem = function (
    productoid,
    productonombre,
    productodescripcion,
    productoprecio,
    stock,
    ci,
    imagePath
  ) {
    console.log("entra aca removeitem");
    var urlAjax = PATH + 'includes/ajaxFunctions.php';
    var dataJson = {
      "removeItem": "set",
      "ci": ci,
      "precio": productoprecio,
      "idProduct": productoid,
    };
    $.ajax({
      url: urlAjax,
      type: 'post',
      dataType: "json",
      data: dataJson,
      success: function (response) {
        console.log(response);
        $("#cart-content-" + productoid).remove();
        if (response["resultado"] >= 1) {
          var $newItem = $(`
          <li id="cart-content-${productoid}" class="cart-count-item">
          <a class="minicart-product-image">
              <img class ="cart-list-item" src="${imagePath}" alt="cart products">
          </a>
          <div class="minicart-product-details">
              <h6><a>${productonombre} x ${response["resultado"]}</a></h6>
              <span>$ ${productoprecio}</span>
          </div>
          <button class="close" onClick="removeItem(${productoid},'${productonombre}','${productodescripcion}',${productoprecio},${stock},'${ci}','${imagePath}');">
              <i class="fa fa-close"></i>
          </button>
          </li>`);
          $("#cart-content").append($newItem);
        }

        var span = $("#cart-subtotal > span");
        var valueSubtotal = parseInt(span.text(), 10);
        valueSubtotal = valueSubtotal - productoprecio;
        span.text(valueSubtotal);
        var span1 = $(".cart-count-item");
        var value1 = span1.length;
        var priceOver = $(".item-text");
        priceOver.text(valueSubtotal);
        priceOver.append(`<span class="cart-item-count">${value1}</span>`);
        //cambia la cantidad de productos 
        var idnuevo = ".cantidad" + productoid;
        var cantProduct = $(idnuevo);
        var valueCant = parseInt(cantProduct.first().text(), 10);
        valueCant = valueCant - 1;
        if (valueCant == 0) {
          cantProduct.text("vendido");
          cantProduct.addClass("stickersold").removeClass("sticker");
          $(".interact" + productoid).remove();
        } else {
          cantProduct.text(valueCant);
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus);
        console.log("Error: " + errorThrown);
      }
    });
  }

  comprar = function (ci, metodopago, dirEnvio, dirFacturacion, improtetotal) {
    var urlAjax = PATH + 'includes/ajaxFunctions.php';
    var dataJson = {
      "comprar": "set",
      "ci": ci,
      "metodopago": metodopago,
      "dirEnvio": dirEnvio,
      "dirFacturacion": dirFacturacion,
      "improtetotal": improtetotal,
    };
    $.ajax({
      url: urlAjax,
      type: 'post',
      dataType: "json",
      data: dataJson,
      success: function (response) {
        window.location.href = PATH + "main"
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus);
        console.log("Error: " + errorThrown);
      }
    });
  }
});