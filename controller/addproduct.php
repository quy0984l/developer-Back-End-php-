<?php 
require_once '../model/product_db.php';
$productdb = new Product_Db;
$photo_name = $_FILES['photo']['name'];
$productdb ->addproduct($_POST['name'],$_POST['price'],$photo_name,$_POST['category']);

$target = "../images/";
$target_file = $target.basename($photo_name);
move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file);

header('location:../table.php');
?>