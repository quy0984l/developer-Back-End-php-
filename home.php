<?php
require_once './model/product_db.php';
$product = new Product_Db();
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


               
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $idProducts = $product->getidproduc($id); 

                    $perPage = 3; // Số sản phẩm trên mỗi trang
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
                    $total = count($idProducts);//tổng sản phẩm 

                    $url = $_SERVER['PHP_SELF']."?id=".$id;
                    $totalProducts = $product->getid3ProductsByType($id,$page, $perPage); 
                    $d=2;
                }
                else{
                    $getProducts = $product->getallproduct(); 

                    $perPage = 6; // Số sản phẩm trên mỗi trang
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
                    $total = count($getProducts);//tổng sản phẩm 

                    $d=1;
                    $url = $_SERVER['PHP_SELF']."?page=".$d;   
                    $totalProducts  = $product->getallproductt($page, $perPage);  
                }



                      foreach ($totalProducts  as $value) :
                ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="images/<?= $value['photo']?>" class="card-img-top" alt="<?= $value['name'] ?>"  height="250px">
                        <div class="card-body text-center">
                            <h5 class="card-title"><a href="detail.php?id=<?php echo $value['id']?>"><?= $value['name']?></a></h5>
                            <?php
                            foreach ($allcategori as $value2) {
                                if($value['category_id']==$value2['id']){
                              ?>
                                <p class="card-text"><?= $value2['description']?> </p>
                             <?php
                                }
                            }
                            ?>
                           
                            <a href="./controller/addproductcarthome.php?id=<?=$value['id']?>" class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                </div>
                
                <?php  endforeach; ?>

            </div>

            <?php
              if(isset($_GET['id'])):
                $id = $_GET['id']; ?>
  
            <div class="pagination justify-content-center">
            <ul class="store-pagination">
                <?php echo $product->paginatecategory($url, $total, $perPage, $page); ?>
            </ul>
                             <?php endif?>
                             

                             <?php if ($d == 1): ?>
            <div class="pagination justify-content-center">
            <ul class="store-pagination">
                <?php echo $product->paginatehome($url, $total, $perPage, $page); ?>
                <?php endif; ?>

            </ul>

    
        </div>
        </div>

    </div>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; TDC 2024</p>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>