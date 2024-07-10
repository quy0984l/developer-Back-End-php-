<?php
 session_start();
if(isset($_GET['id'])){
    $masp =$_GET['id'];
    if(isset($_SESSION['cart'][$masp])){
        $_SESSION['cart'][$masp]++;
        //nếu sp mã $masp đã tồn tại trong giỏ số lượng tăng 1 
    }
    else{
         //nếu sp mã $masp chưa tồn tại trong giỏ số lượng =1
        $_SESSION['cart'][$masp]=1;
    }
    
}
header('location:../cart.php');
?>