<?php

$image = $_POST['image'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$rating = $_POST['rating'];
$id = $_POST['id'];

$conn = new mysqli('localhost', 'root', '', 'product');
$sql = "UPDATE `all_products` SET (image, brand, name , price, rating, id) VALUES ('$image', '$brand', '$name', $price, $rating, $id)' WHERE 1";
// $sql = "INSERT INTO cart (image, brand, name , price, rating, id) VALUES ('$image', '$brand', '$name', $price, $rating, $id)";

if ($conn->query($sql) === TRUE) {
    echo "$name is added to cart";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
