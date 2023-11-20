

var product_id = document.getElementsByClassName("add");
for (var i = 0; i < product_id.length; i++) {
  product_id[i].addEventListener("click", function (event) {
    var target = event.target;
    var add_id = target.getAttribute("data-id");
    var add_name = target.getAttribute("data-name");
    var add_image = target.getAttribute("data-image");
    var add_brand = target.getAttribute("data-brand");
    var add_price = target.getAttribute("data-price");
    var add_rating = target.getAttribute("data-rating");
     console.log(add_name + +add_id+add_brand+add_image+add_price+add_rating);

    var xhr = new XMLHttpRequest();
    var data = new FormData();
    data.append("image", add_image);
    data.append("brand", add_brand);
    data.append("name", add_name);
    data.append("price", add_price);
    data.append("rating", add_rating);
    data.append("id", add_id);

    xhr.open("POST", "insert_product.php");
    xhr.send(data);

    xhr.onload = function () {
      if (xhr.status === 200) {
        target.textContent = "Added to Cart";
        console.log(add_name + "is added to cart successfully");
      } else {
        console.error("Failed to add product:", xhr.statusText);
      }
    };
  });
}



