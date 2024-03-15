function addToCartAjax() {
  $(".add_cart").click(function () {
    
    var inputId = $(this).attr("id");
    var url_cart = "cart/addToCart/" + inputId;
    $.ajax({
      url: url_cart,
      data: "qte=1",
      dataType: "json",
      success: (data) => {
        $("#nombre").html(data);
        console.log("nb produits dans mon cart = " + data);
      },
      error: (jqXHR, status, error) => {
        console.log("ERREUR AJAX", status, error);
      },
    });
  });
}

function addProductToCartAjax(productId) {
  
  $("#form" + productId).on("click", (evtSubmit) => {
    evtSubmit.preventDefault();
    var url_cart = "cart/addToCart/" + productId;
    $.ajax({
      url: url_cart,
      data: "qte=" + $("#field" + productId).val(),
      dataType: "json",
      success: (data) => {
        $("#nombre").html(data);
        console.log("nb produits dans mon deuxième cart = " + data);
      },
      error: (jqXHR, status, error) => {
        console.log("ERREUR AJAX", status, error);
      },
    });
  });
}
