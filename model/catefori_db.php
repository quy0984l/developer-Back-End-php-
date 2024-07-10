<?php 
require_once 'db.php';

class Category_db extends Db{

    public function getallcategori(){
        $sql = parent::construc()->prepare("SELECT *FROM categories");
        $sql ->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
?>