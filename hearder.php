<?php 
session_start()
?>
<?php 
require_once './model/catefori_db.php';
// require_once '../categori/model/catefori_db.php';
$categori = new Category_db();
$allcategori = $categori->getallcategori();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand text-warning fw-bolder" href="home.php">SHOP ĐIỆN TỬ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="home.php">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="table.php">QUẢN LÝ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            DANH MỤC
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="home.php">Tất cả Sản Phẩm</a></li>
                            <?php 
                        foreach ($allcategori as $value) {
                          ?>
                            <li><a class="dropdown-item" href="home.php?id=<?= $value['id']?>"><?=$value['name']?></a>
                            </li>
                            <?php
                        }
                        ?>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="search.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success text-black" type="submit"
                        style="background-color: yellow">Tìm</button>
                </form>

                <button class="btn btn-outline-dark" type="submit" style="background-color: yellow; margin-left: 10px;">
                    <a href="cart.php" style="text-decoration: none;color: black">
                        <i class="bi-cart-fill me-1"></i>
                        Giỏ
                        <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                    </a>
                </button>
                <!-- <button class="btn btn-outline-dark" type="submit" style="background-color: yellow; margin-left: 10px;">
                    <a class="btn-login" style ="text-decoration: none;color: black"
                        id="loginButton" href="login/loginView.php">Đăng Nhập</a>
                </button> -->

                <?php if(isset($_SESSION['email'])): 
                ?>
                <i class="fa-solid fa-user"></i>
                <?php
                echo $_SESSION['email'];
                ?>
                <form action="controller/logout.php">
                    <input type="submit" value="logout" name="logout" style="background-color: yellow; margin-left: 10px;">
                </form>
                <?php else: ?>
                <button class="btn btn-outline-dark" type="submit" style="background-color: yellow; margin-left: 10px;">
                    <a class="btn-login" style="text-decoration: none;color: black" id="loginButton"
                        href="login/loginView.php">Đăng Nhập</a>
                </button>
                <?php endif; ?>



            </div>


        </div>
        </div>
    </nav>