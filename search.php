<?php
require_once './model/product_db.php';
$product = new Product_Db();
// include(__DIR__ . './header.php');
include 'hearder.php';
?>
    <!-- Header -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">Homepage</p>
            </div>
        </div>
    </header>
    <!-- section -->
    <div class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-4">Sản Phẩm Shop</h2>
                </div>
                <?php  
                     // //    tim kiem chua phân trang 
                if(isset($_GET['search']) && $_GET['search'] != ''){
                    $keyword = $_GET['search'];
                    $allproduct = $product ->searchq($keyword);
                
                

                      foreach ($allproduct as $value) :
                ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="images/<?= $value['photo']?>" class="card-img-top" alt="<?= $value['name'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><a href="detail.php?id=<?php echo $value['id']?>"><?= $value['name'] ?></a></h5>
                            <?php
                            foreach ($allcategori as $value2) {
                                if($value['category_id']==$value2['id']){
                              ?>
                                <p class="card-text"><?= $value2['description']?> </p>
                             <?php
                                }
                            }
                            ?>
                           
                            <a href="#" class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                </div>
                
                <?php  endforeach;
                } ?>

            </div>
            <div class="clearfix justify-content-center mt-3">
                <div class="hint-text">
                    Showing <b>3</b> out of <b>14</b> entries
                </div>
                <ul class="pagination">
                    <li class="page-item">
                        <a href="#" class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item">
                        <a href="detail.php" class="page-link">Next</a>
                    </li>
                </ul>
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