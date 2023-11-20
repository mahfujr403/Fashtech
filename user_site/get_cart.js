

document.addEventListener("DOMContentLoaded", function () {
  function updateCartCount() {
    fetch("get_cart_count.php")
      .then((response) => response.json())
      .then((data) => {
        const cartCountElement = document.querySelector("#navbar li a .count");
        if (cartCountElement) {
          cartCountElement.textContent = data.count;
        }
      })
      .catch((error) => console.error("Error fetching cart count:", error));
  }

  updateCartCount();

 
});
