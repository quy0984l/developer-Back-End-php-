<?php 
session_start();
?>
<?php 
include '../model/user_db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();


    if($user->checkLogin($email,$password)){
        // echo 'thanh cong';
        $_SESSION['email'] = $email;
        header('location:../home.php');
        exit(); // Dừng việc thực thi sau khi chuyển hướng
    }
    else{
        echo 'login failed';
    }
}
?>