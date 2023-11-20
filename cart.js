// Event listener for the "Remove" buttons
var product_id = document.getElementsByClassName("dlt");
for (var i = 0; i < product_id.length; i++) {
  product_id[i].addEventListener("click", function (event) {
    var target = event.target;
    var dlt_id = target.getAttribute("data-id");

    var xhr = new XMLHttpRequest();
    var data = new FormData();
    data.append("id", dlt_id);

    xhr.open("POST", "dlt_product.php");
    xhr.send(data);

    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(dlt_id + " is removed from cart successfully");

        updateCartSubtotalAndDiscount();
      } else {
        console.error("Failed to remove product:", xhr.statusText);
      }
    };
  });
}



// Function to update the total cart subtotal and discount
function updateCartSubtotalAndDiscount() {
  const subtotalElements = document.querySelectorAll('[id^="subtotal-"]');

  let totalCartSubtotal = 0;

  subtotalElements.forEach((subtotalElement) => {
    totalCartSubtotal += parseFloat(
      subtotalElement.textContent.replace("৳", "")
    );
  });

  const couponInput = document.getElementById("coupon-input");
  const couponDiscount = calculateCouponDiscount(
    couponInput.value,
    totalCartSubtotal
  );

  const cartSubtotalElement = document.getElementById("cart-subtotal");
  cartSubtotalElement.textContent = `৳${totalCartSubtotal}`;

  const discountElement = document.getElementById("discount");
  discountElement.textContent = `৳${couponDiscount}`;

  const total = totalCartSubtotal - couponDiscount;
  const totalElement = document.getElementById("totalpay");
  totalElement.textContent = `৳${total}`;
}

// Function to apply the coupon and update the total
function applyCoupon() {
  updateCartSubtotalAndDiscount();
}

// Function to calculate the coupon discount
function calculateCouponDiscount(couponCode, totalCartSubtotal) {
  if (couponCode === "mahfuj") {
    const appliedElement = document.getElementById("capp");
    appliedElement.textContent = `Coupoun Discount (applied)`;
    return 200;
  }
  const appliedElement = document.getElementById("capp");
  appliedElement.textContent = `Coupoun Discount (not applied)`;
  return 0;
}

updateCartSubtotalAndDiscount();


function updateSubtotal(inputField) {
  const productId = inputField.dataset.productId;
  const quantity = parseInt(inputField.value);

  const priceElement = document.getElementById(`price-${productId}`);
  const price = priceElement ? parseFloat(priceElement.value) : 0;
  const subtotal = price * quantity;

  const cartTotal = document.getElementById(`subtotal-${productId}`);
  cartTotal.textContent = `৳${subtotal}`;

  updateCartSubtotalAndDiscount();
}
