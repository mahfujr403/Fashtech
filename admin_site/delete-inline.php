<?php
$p_id = $_GET['id'];
  
$conn = mysqli_connect("localhost", "root", "", "product") or die("Connection failed");
$sql = "DELETE FROM all_products WHERE id = {$p_id}";
$result = mysqli_query($conn, $sql) or die("QUery Unsessful");


header("location:http://localhost:3000/admin_site/admin_panel.php?message=Product  has deleted successfully");

mysqli_close($conn);
