<?php 
// session_start();
?>
<?php
require_once './model/product_db.php';
// include(__DIR__.'./header.php');
include 'hearder.php';
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
                            <form method="GET" action="">
                                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm"
                                    value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                <button type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php 
               $product = new Product_Db();
               $allproduct = $product ->getallproduct(); 
               if(isset($_SESSION['cart'])):
            ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>Tên</th>
                            <th>Gía</th>
                            <th>Ảnh</th>
                            <th>Mục Lục</th>
                            <th>Số Lượng</th>
                            <th>Tổng Giá</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <?php 
                $total = 0;
                $search = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm
                foreach ($_SESSION['cart'] as $key => $value) ://$key tương ứng với id của sp còn $value thì số lượng sp
                    foreach ($allproduct as $va) :
                        if($va['id']==$key):
                            if (empty($search) || stripos($va['name'], $search) !== false): // Kiểm tra từ khóa tìm kiếm
                            $total +=$va['price']*$value;
                ?>
                    <tbody>
                        <tr>

                            <td><?= $va['name']?></td>
                            <td><?= $va['price']?></td>
                            <td><img src="./images/<?= $va['photo']?>" alt=".." width="100px" height="100px"></td>
                            <td><?= $va['category_id']?></td>
                            <td><?php echo $value?> </td>
                            <td><?php echo $total?> </td>

                            <td>
                                <a href="./controller/deletecartproduct.php?id=<?= $va['id'] ?>" class="delete" onclick="del(event)">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                    <?php
                        endif;
                    endif;
                    endforeach;
                endforeach;
              ?>

                </table>
                <?php 
              endif;
              ?>
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
      function del(event){
        if(!confirm("co muon xoa k ")){
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