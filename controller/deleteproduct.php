<?php 
require_once '../model/product_db.php';
$product = new Product_Db;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product-> deleteproduct($id);
    
    header('location:../table.php');
}
?>