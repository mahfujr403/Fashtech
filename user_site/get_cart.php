<?php
$conn = new  mysqli('localhost', 'root', '', 'product');
$sql_cart = "SELECT COUNT(*) as count FROM cart";
$cartItem  = $conn->query($sql_cart);
$cartItemCount = mysqli_fetch_assoc($cartItem)['count'];


?>