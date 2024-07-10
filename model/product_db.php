<?php 
require_once 'db.php';

class Product_Db extends Db{
   // all product(home)
    public function getallproduct(){
        $sql = parent::construc()->prepare("SELECT *FROM products");
        $sql ->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
        
     }
    //lấy tất cả sp có phân trang(home)
public function getallproductt($page, $perPage) {
    $offset = ($page - 1) * $perPage;
    $sql = parent::construc()->prepare("SELECT * FROM products LIMIT ?, ?");
    $sql->bind_param("ii", $offset, $perPage);
    $sql->execute();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item;
}

// Hàm phân trang home
function paginatehome($url, $total, $perPage, $page) {
    $totalLinks = ceil($total / $perPage);
    $link = "";
    for ($i = 1; $i <= $totalLinks; $i++) {
        if ($page == $i) {
            // $link .= "<li class='active'>$i</li>";
            $link .= "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";

        } else {
            // $link .= "<li><a href='$url&page=$i'>$i</a></li>";
            $link .= "<li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
            
        }
    }
    return $link;
}
    //  //lấy sp theo muc luc 
    //  public function getidproduc($id){
    //     $sql = parent::construc()->prepare("SELECT *FROM products WHERE category_id = ?");
    //     $sql->bind_param("s",$id);
    //     $sql ->execute();
    //     $item = array();
    //     $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $item;
    //  }

      //lấy sp theo id
     public function idproduct($id){
    $sql = parent::construc()->prepare("SELECT *FROM products WHERE id = ?");
    $sql->bind_param("s",$id);
    $sql ->execute();
    $item = array();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item;
    
     }
 //tiem kiem chua phân trang 
    public function searchq($keyword)
     {
     // Chuẩn bị câu truy vấn SQL
     $sql = self::construc()->prepare("SELECT * FROM products WHERE `name` LIKE ?");
     $keyword = "%$keyword%";
     $sql->bind_param("s", $keyword);
     $sql->execute(); // return an object
     
     $items = array();
     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
     
     return $items; // return an array
    }
    
    //themsp
    public function addproduct($name,$price,$photo,$category){
        $sql = self::construc()->prepare("INSERT INTO `products`(`name`, `price`, `photo`, `category_id`) 
        VALUES (?,?,?,?)");
         $sql->bind_param("sisi", $name,$price,$photo,$category);
         return $sql->execute();
    }
    //xóa sp
    public function deleteproduct($id){
        $sql = self::construc()->prepare("DELETE FROM `products` WHERE `id` = ?");
        $sql->bind_param("i",$id);
        return $sql->execute();
    }
        //suasp
    public function updateProduct($id, $name, $price, $photo, $categoryId){
        $sql = parent::construc()->prepare("UPDATE `products` SET `name`=? , `price`=? ,`photo` = ?,`category_id` = ? WHERE `id` = ?");
        $sql->bind_param('sisii',$name, $price, $photo, $categoryId,$id);
        return $sql->execute();
        }

// Lấy sản phẩm theo danh mục và phân trang
public function getidproduct($id, $page, $perPage) {
    $offset = ($page - 1) * $perPage;
    $sql = parent::construc()->prepare("SELECT * FROM products WHERE category_id = ? LIMIT ?, ?");
    $sql->bind_param("sii", $id, $offset, $perPage);
    $sql->execute();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item;
}

// Lấy tất cả sản phẩm theo danh mục
public function getidproduc($id) {
    $sql = parent::construc()->prepare("SELECT * FROM products WHERE category_id = ?");
    $sql->bind_param("s", $id);
    $sql->execute();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item;
}


// Lấy (3) sản phẩm theo loại
public function getid3ProductsByType($type_id, $page, $perPage) {
    $firstLink = ($page - 1) * $perPage;
    $sql = self::$connection->prepare("SELECT * FROM products WHERE category_id = ? LIMIT ?, ?");
    $sql->bind_param("iii", $type_id, $firstLink, $perPage);
    $sql->execute();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items;
}

// Hàm phân trang
function paginatecategory($url, $total, $perPage, $page) {
    $totalLinks = ceil($total / $perPage);
    $link = "";
    for ($i = 1; $i <= $totalLinks; $i++) {
        if ($page == $i) {
            // $link .= "<li class='active'>$i</li>";
            $link .= "<li class='page-item'>$i</a></li>";

        } else {
            // $link .= "<li><a href='$url&page=$i'>$i</a></li>";
            $link .= "<li class='page-item'><a href='$url&page=$i' class='page-link'>$i</a></li>";
            
        }
    }
    return $link;
}


}


?>