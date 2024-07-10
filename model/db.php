<?php 
require_once 'config.php';

class Db{
    public static $connection;
    public static function construc(){
        if(!self::$connection){
            if(!self::$connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME));
            if(!self::$connection->set_charset(DB_CHARSET));
        }
        // if(!self::$connection->connect_errno){
        //     die("kết nối thành công");
        // }
        // else{
        //     echo "Lỗi kết nối";
        // }
        return self::$connection;
    }
}
?>
