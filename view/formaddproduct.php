<?php 
require_once '../model/catefori_db.php';
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container">
          <a class="navbar-brand text-warning fw-bolder" href="../home.php">ABC SHOP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
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
              <form action="../controller/addproduct.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label">Tên</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3">
                  <label class="form-label">Giá</label>
                  <input type="text" class="form-control" placeholder="Enter price" name="price">
                </div>
                <div class="mb-3">
                  <label class="form-label">Chọn Ảnh</label>
                  <!-- <input type="file" class="form-control" placeholder="Enter description" name="photo" accept="image/*"> -->
                  <input type="file" class="form-control" placeholder="Enter description" name="photo" accept="image/*" onchange="previewImage(event)">
                  <img id="preview" src="#" alt="Image Preview" style="width: 300px; height: 300px;">
                </div>
                <div class="mb-3">
                  <label class="form-label">Mục Lục</label>
                  <select class="form-select" aria-label="a" name="category">
                    <?php 
                    foreach ($allcategori as $value) {
                      ?>
                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                      <?php
                    }
                    ?>


                  </select>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TDC 2023</p></div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
  function previewImage(event) {
    var reader = new FileReader();  // Tạo một đối tượng FileReader mới

    reader.onload = function() {  // Định nghĩa hàm xử lý sự kiện onload của FileReader
      var output = document.getElementById('preview');  // Lấy thẻ img có id là 'preview'
      output.src = reader.result;  // Gán thuộc tính src của thẻ img bằng kết quả đọc được từ FileReader
      output.style.display = 'block';  // Hiển thị thẻ img bằng cách thay đổi thuộc tính display
    };

    reader.readAsDataURL(event.target.files[0]);  // Đọc nội dung của file đã chọn dưới dạng Data URL
  }
</script>

</body>
</html>