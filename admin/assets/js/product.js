var ruta = 'http://'+window.location.host+'/proyecto_php_tec/admin/'

function addProduct() {
    var productName=document.getElementById("productName").value;
    var productCategory=document.getElementById("productCategory").value;
    var productPrice=document.getElementById("productPrice").value;
    var productStock=document.getElementById("productStock").value;
    var productDescription=document.getElementById("productDescription").value;
    var images = document.getElementsByName("productPhoto[]");
    var imagesArray = [];
    for (i=0; i<images.length;i++ ){
        if(images.item(i).value != '' ){
            imagesArray.push(images.item(i).value);
        }
    }
    if(productName!='' && productCategory!='' && productPrice!='' && productStock!='' && productDescription!=''){
        if(imagesArray.length==0){
            $('#errorAddProduct').html("<div class='alert alert-danger margin-bottom-30'>Se deben cargar al menos una imagen</div>");
        }else{
            $.post(ruta+"product/add_product_db",{
                productName:productName,
                productCategory:productCategory,
                productPrice:productPrice,
                productStock:productStock,
                productDescription:productDescription,
                imagesArray:imagesArray,
            },function(respuesta){
                if(respuesta==1){
                    window.location=ruta+"product?msj=agregar"
                }else if(respuesta==-1){
                    $('#errorAddProduct').html("<div class='alert alert-danger margin-bottom-30'>Existe una categoria con ese nombre.</div>");
                    $('#btn-send-product').css('display', '');
                }else{
                    $('#errorAddProduct').html("<div class='alert alert-danger margin-bottom-30'>Error. Intentá de nuevo</div>");
                    $('#btn-send-product').css('display', '');
                }
            });
        }
    }else{
        $('#errorAddProduct').html("<div class='alert alert-danger margin-bottom-30'>Los campos son obligatorios.</div>");
    }



    return false;
}


function hiddenField(error, data, response){
    if(error==null && response["status"]=="success"){
        document.getElementById("uploadProductPhoto"+response["orden"]).value = response["file"]
    }
}


function removePhoto(data){
    document.getElementById("uploadProductPhoto"+data["server"]["orden"]).value="";
}


function changeProductStatus(){


    return false;
}