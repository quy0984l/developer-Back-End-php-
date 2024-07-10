<?php 
require_once '../model/catefori_db.php';
require_once '../model/product_db.php';
$categori = new Category_db();
$product = new Product_Db();

$allcategori = $categori->getallcategori();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand text-warning fw-bolder" href="../home.php">Shop Điện Tử</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="../home.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../table.php">Quản Lý</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- section -->
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Đăng Nhập </h2>
                <form action="../controller/loginuser.php" method="POST" id="loginForm">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name ="login">Đăng Nhập</button>
                    <button type="submit" class="btn btn-primary" name ="login" style="margin-left: 10px;">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; TDC 2023</p>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>