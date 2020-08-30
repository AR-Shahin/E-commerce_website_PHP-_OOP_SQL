<?php


namespace App\classes;

use App\classes\Database;
use App\classes\Helper;
use App\classes\Session;

#Session::init();

class Cart
{
    public static function addToCart($data){
        $pid = $data['pid'];
        $quantity = $data['quantity'];
        $sid = session_id();
        $singleProduct = self::singleProductById($pid)->fetch_assoc();
        $pname =  $singleProduct['name'];
        $price =  $singleProduct['price'];
        $image =  $singleProduct['image'];
        if(self::doubleProductCheck($pid,$sid) === false){
            return 0;
            die();
        }else {
            $sql = "INSERT INTO `cart`(`sid`, `pid`, `pname`, `price`, `quantity`, `image`) VALUES ('$sid','$pid','$pname','$price','$quantity','$image')";
            $res = Database::connect($sql);
            if ($res != false) {
                return  true;
            } else {
                $txt = "<span class='error'>Product Not Add !</span> ";
                return $txt;
            }
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

    public static function doubleProductCheck($pid,$sid){
        $sql = "SELECT * FROM `cart` WHERE `sid` = '$sid' AND `pid` = '$pid' ";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $row = mysqli_num_rows($result);
            if( $row == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function getCartProduct(){
        $sid = session_id();
        $sql = "SELECT * FROM `cart` WHERE `sid` = '$sid' ORDER BY id DESC ";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }else{
            return false;
        }
    }

    public static function countCartRow(){
        $sid = session_id();
        $sql = "SELECT * FROM `cart` WHERE `sid` = $sid";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $row = mysqli_num_rows($result);
            return $row;
        }else{
            return 0;
        }

    }

    public static function updateCartQuantity($data){
        $sid = session_id();
        $cid = $data['cid'];
        $quantity = $data['quantity'];
        if($quantity<=0){
            $txt =  self::deleteCartIteam($cid);
            return $txt;
        }else {
            $sql = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `sid` = '$sid' AND `id` = '$cid'";
            $res = Database::connect($sql);
            if ($res != false) {
                $txt = "<span class='success'>Updated Cart!</span> ";
                return $txt;
            } else {
                $txt = "<span class='error'>Not Update Cart !</span> ";
                return $txt;
            }
        }
    }

    public static function deleteCartIteam($id){
        $sid = session_id();
        $sql = "DELETE FROM `cart` WHERE `sid` = '$sid' AND `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            $txt = "<span class='success'>Delete One Iteam!</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Not Delete</span> ";
            return $txt;
        }
    }

    public static function countCartProduct(){
        $sid = session_id();
        $sql = "SELECT * FROM `cart` WHERE `sid` = '$sid'";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $row = mysqli_num_rows($res);
            return $row;
        }else{
            return false;
        }
    }
public static function deleteCart($sid){
    $sql = "DELETE FROM `cart` WHERE `sid` = '$sid'";
    $res = Database::connect($sql);
    if($res != false){
        Session::unsetSession('Total');
        Session::unsetSession('Qty');
        return ;
    }else{
        return ;
    }
}
}