<?php

echo $p_image = $_POST['pimage'];
echo $p_brand = $_POST['pbrand'];
echo $p_name = $_POST['pname'];
echo $p_price = $_POST['pprice'];
echo $p_rating = $_POST['prating'];

$conn = mysqli_connect("localhost", "root", "", "product") or die("Connection failed");

$sql = "INSERT INTO all_products(image,brand,name,price,rating) VALUES ('{$p_image}','{$p_brand}','{$p_name}',$p_price,$p_rating)";
$result = mysqli_query($conn, $sql) or die("QUery Unsessful");


header("location:http://localhost:3000/admin_panel.php?message=$p_name has added in database successfully");

mysqli_close($conn);
