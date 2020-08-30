<?php


namespace App\classes;

class Database
{
    public static function db(){
        $link = mysqli_connect('localhost:3307','root','','ecommerce');
        if($link){
            return $link;
        }else{
            return false;
        }
    }
    public static function test(){
        echo 'i am from db';
    }
    public static function connect($sql){
        $res = mysqli_query(self::db(),$sql);
        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public static function addToCart($data){
        $pid = $data['pid'];
        $quantity = $data['quantity'];
        $sid = session_id();
        $singleProduct = self::singleProductById($pid)->fetch_assoc();
        $pname =  $singleProduct['name'];
        $price =  $singleProduct['price'];
        $image =  $singleProduct['image'];
        if(self::doubleProductCheck($pid,$sid) == false){
            $txt = "<span class='error'>Product Already Added to Cart !</span> ";
            return $txt;
        }else {
            $sql = "INSERT INTO `cart`(`sid`, `pid`, `pname`, `price`, `quantity`, `image`) VALUES ('$sid','$pid','$pname','$price','$quantity','$image')";
            $res = self::connect($sql);
            if ($res != false) {

                return  true;
            } else {
                $txt = "<span class='error'>Product Not Add !</span> ";
                return $txt;
            }
        }
    }

    public static function doubleProductCheck($pid,$sid){
        $sql = "SELECT * FROM `cart` WHERE `sid` = '$sid' AND `pid` = $pid ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            if(mysqli_num_rows($result) == 0){
                return true;
            }
        }else{
            return false;
        }
    }

    public static function singleProductById($id){
        $sql = "SELECT * FROM `products` WHERE `id` = $id ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            if(mysqli_num_rows($result) == 0){
                return false;
            }
            return $result;
        }else{
            return false;
        }
    }
}