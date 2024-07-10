<?php 
require_once './model/product_db.php';
include(__DIR__.'./hearder.php');
// include 'hearder.php';
?>

    <!-- section -->
    <section class="py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-sm-6">
                  <h2>Manage Products</h2>
                </div>
                <div class="col-sm-6">
                  <a
                    href="./view/formaddproduct.php"
                    class="btn btn-success"
                    ><i class="bi bi-pencil"></i
                    ><span>Add New Product</span>
                  </a>
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>   
                  <th>Mã</th>              
                  <th>Tên</th>
                  <th>Gía</th>
                  <th>Ảnh</th>
                  <th>Mục Lục</th>
                  <th>Chức Năng</th>
                </tr>
              </thead>
              <?php 
              $product = new Product_Db();
              $allproduct = $product ->getallproduct(); 
              foreach ($allproduct as $value) {
                ?>
                <tbody>
                <tr> 
                  <td><?= $value['id']?></td>                
                  <td><?= $value['name']?></td>
                  <td><?= $value['price']?></td>
                  <td><img src="./images/<?= $value['photo']?>" alt=".." width="100px" height="100px"></td>
                  <?php 
                  foreach ($allcategori as $valu) :
                    if($valu['id']==$value['category_id']):
                    ?>
                      <td><?= $valu['name']?></td>
                    <?php
                    endif;
                  endforeach;
                  ?>
                  <td>
                    <a
                      href="./view/formeditproduct.php?id=<?php echo $value['id']?>"
                      class="edit"                      
                      ><i class="bi bi-pencil"></i
                    >Edit</a>
                    <a
                      href="./controller/deleteproduct.php?id=<?= $value['id']?>"
                      class="delete" onclick="confirmDelete(event)"                      
                      ><i class="bi bi-trash"></i
                    >Delete</a>
                  </td>
                </tr>
            
              </tbody>
                <?php
              }
              ?>
              
            </table>
            <div class="clearfix">
              <div class="hint-text">
                Showing <b>5</b> out of <b>25</b> entries
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
                  <a href="#" class="page-link">Next</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      function confirmDelete(event){
        if(!confirm("bạn có muốn xóa sẩn phẩm không ?")){
          event.preventDefault();
        }
      }
    </script>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; TDC 2023</p>
      </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
