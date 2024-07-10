<?php
session_start();

if (isset($_GET['id'])) {
    $remove_id = $_GET['id'];

  
    unset($_SESSION['cart'][$remove_id]);
}


header("Location: ../cart.php"); 
exit();

?>
