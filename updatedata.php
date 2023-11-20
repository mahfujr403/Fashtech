<?php

$p_image = $_POST['image'];
$p_brand = $_POST['brand'];
$p_name = $_POST['name'];
$p_price = $_POST['price'];
$p_rating = $_POST['rating'];
$p_id = $_POST['id'];

$conn = mysqli_connect("localhost", "root", "", "product") or die("Connection failed");

$sql = "UPDATE all_products SET image = '{$p_image}', brand = '{$p_brand}',name = '{$p_name}',price = $p_price,rating = $p_rating WHERE id = {$p_id}";
$result = mysqli_query($conn, $sql) or die("QUery Unsessful");


header("location:http://localhost:3000/admin_panel.php?message=Product id $p_id has updated successfully");

mysqli_close($conn);
?>
