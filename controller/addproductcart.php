<?php
session_start();

if(isset($_GET['id']) && isset($_GET['quantity'])) {
    $productId = $_GET['id'];
    $quantity = $_GET['quantity'];

    // Thêm sản phẩm vào session giỏ hàng
    if(isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Chuyển hướng về trang giỏ hàng
header('Location: ../cart.php');
exit;
?>

