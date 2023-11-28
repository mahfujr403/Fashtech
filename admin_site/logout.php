<?php
$conn = new mysqli('localhost', 'root', '', 'author');
session_start();
session_unset();
session_destroy();

header('location:../user_site/index.php');
