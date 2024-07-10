
<?php
include(__DIR__ . './hearder.php');
require_once './model/product_db.php';
$product = new Product_Db();
// include 'hearder.php';
?>
     <!-- Product section-->
     <section class="py-5">
      <div class="container px-4 px-lg-5 my-5">
        <?php 
      
        if(isset($_GET['id'])):
          $id = $_GET['id'];
          $idproduct =$product->idproduct($id);

          foreach ($idproduct as  $value) :
            ?>
             <div class="row gx-4 gx-lg-5 align-items-center">
              <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="images/<?=$value['photo']?>" alt="..." /></div>
              <div class="col-md-6">
              <?php
                  foreach ($allcategori as  $value2) :
                    if($value['category_id']==$value2['id']):
                      ?>
                         <h3><a href="home.php?id=<?=$value2['id'] ?>"><?= $value2['name']?> </a></h3>
                      <?php
                   endif;
                  endforeach;
                  ?>
                  <div class="small mb-1"><?= $value['id']?></div>
                  <h1 class="display-5 fw-bolder"><?= $value['name']?></h1>
                  <div class="fs-5 mb-5">                      
                      <span><?= $value['price']?></span>
                  </div>
                  <?php
                  foreach ($allcategori as  $value2) :
                    if($value['category_id']==$value2['id']):
                      ?>
                        <p class="card-text"><?= $value2['description']?> </p>
                      <?php
                   endif;
                  endforeach;
                  ?>
                
                  <!-- <div class="d-flex">
                  <input class="form-control text-center me-3 inputQuantity" type="number" value="1" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0 addToCartBtn" type="button" data-product-id="<?= $value['id'] ?>">
                        <i class="bi-cart-fill me-1"></i>
                        Thêm vào giỏ hàng
                    </button>
                  </div> -->

                  <div class="d-flex">
                  <input class="me-3 inputQuantity" type="number" value="1" style="max-width: 3rem" />
                  <button class="addToCartBtn" type="button" data-product-id="<?= $value['id'] ?>">
                         <i class="bi-cart-fill me-1"></i>
                          <a href="./controller/addproductcart.php?id=<?=$value['id']?>">thêm giỏi hàng</a>
                      </button>
                  
              </div>
          </div>
            <?php
         endforeach;
        endif;
        ?>
      </div>
  </section>

  script src="js/bootstrap.bundle.min.js"></script>
<script>
    // Xử lý khi click thêm vào giỏ hàng
    document.querySelectorAll('.addToCartBtn').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            const quantity = this.closest('.d-flex').querySelector('.inputQuantity').value;

            // Chuyển hướng đến trang xử lý thêm vào giỏ hàng với id sản phẩm và số lượng
            window.location.href = `./controller/addproductcart.php?id=${productId}&quantity=${quantity}`;
        });
    });
</script>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TDC 2023</p></div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>