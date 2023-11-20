<?php

$id = $_POST['id'];

$conn = new mysqli('localhost', 'root', '', 'product');
$sql = "DELETE FROM cart WHERE `cart`.`id` = $id";

if ($conn->query($sql) === TRUE) {
  echo "$name is removed from cart";
  
} else {
  echo "Error: " . $conn->error;
}

 $conn->close();

?>