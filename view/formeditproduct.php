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
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand text-warning fw-bolder" href="../home.php">ABC SHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../table.php">Management</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="../search.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success text-white" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- section -->
    <div class="section">
        <div class="container">
            <div class="row justify-content-center my-4">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form product</h4>
                        </div>
                        <?php
              if(isset($_GET['id'])):
                $id = $_GET['id'];
              $productid = $product ->idproduct($id);
            foreach ($productid as $value) :
              ?>
                        <form action="../controller/editproduct.php?id=<?=$value['id']?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Tên</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name"
                                        value="<?=$value['name']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input type="text" class="form-control" placeholder="Enter price" name="price"
                                        value="<?=$value['price']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sửa Hình</label>
                                    <input type="file" class="form-control" placeholder="Enter description" id="photo"
                                        name="photo" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img id="imagePreview" class="imagePreview"
                                        src="../images/<?php echo $value['photo'] ?>" alt="Ảnh xem trước" width="150px"
                                        height="150px">

                                    <script>
                                    // Lắng nghe sự kiện khi người dùng chọn file
                                    document.getElementById('photo').addEventListener('change', function(event) {
                                        // Lấy đối tượng File từ sự kiện
                                        var file = event.target.files[0];

                                        if (file) {
                                            // Tạo đối tượng FileReader
                                            var reader = new FileReader();

                                            // Lắng nghe sự kiện khi FileReader đã đọc xong file
                                            reader.onload = function(event) {
                                                // Gán nguồn ảnh cho thẻ <img>
                                                document.getElementById('imagePreview').src = event.target
                                                    .result;
                                            };

                                            // Đọc file như là một đối tượng dạng data URL
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                    </script>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" aria-label="a" name="category">
                                        <option>Danh Mục</option>
                                        <?php 
                                  foreach ($allcategori as $valu): ?>
                                        <option value="<?php echo $valu['id']; ?>"
                                            <?php if($value['category_id'] == $valu['id']) echo 'selected'; ?>>
                                            <?php echo $valu['name']; ?>
                                        </option>

                              <?php endforeach  ?>



                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                        </form>
                        <?php
            endforeach;
              endif;
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; TDC 2023</p>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>