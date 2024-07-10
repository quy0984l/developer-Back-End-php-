<?php
require_once 'db.php';
Class User extends Db{

    public function checkLogin($hoten, $matkhau)
    {
        $sql = parent::construc()->prepare("SELECT * FROM `user` WHERE `email`=? AND `password`=?");
       // $password = md5($password);
        $sql->bind_param("ss", $hoten, $matkhau);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        return $items == 1;
 
    }
    // public function getUserByEmail($email){
    //     $sql = self::$connection->prepare("SELECT * FROM nguoidung WHERE hoten = ?");
    //     $sql->bind_param("s", $email);
    //     $sql->execute();
    //     $items = array();
    //     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $items;
    
    // }
}
?>