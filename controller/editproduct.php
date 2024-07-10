<?php
      require_once '../model/product_db.php';
      $product = new Product_Db;
      $id=$_GET['id'];

      $photo_name = $_FILES['photo']['name'];
      $product->updateProduct($_GET['id'], $_POST['name'], $_POST['price'], $photo_name, $_POST['category']);

      $target_dir = "../images/";
    $target_file = $target_dir . basename($photo_name);
     move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file);
      header('location:../table.php?ma='.$id);
