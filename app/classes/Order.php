<?php


namespace App\classes;
use App\classes\Database;
use App\classes\Session;
use App\classes\Cart;


class Order
{
    public static function addOrder($cmrId){
        $sid = session_id();
        $cartPro = Cart::getCartProduct();
        if($cartPro){
            while ($res = $cartPro->fetch_assoc()){
                $pId = $res['pid'];
                $pname = $res['pname'];
                $quantity = $res['quantity'];
                $price = ($res['price'] * $quantity);
                $price = $price + ($price * .1);
                $image = $res['image'];
                $sql = "INSERT INTO `orders`(`cusId`, `productId`, `productName`, `quantity`, `price`, `image`,`sid`) VALUES ('$cmrId','$pId','$pname','$quantity','$price','$image','$sid')";
                $result =  Database::connect($sql);
            }
            if($result){
                Cart::deleteCart($sid);
                header('location:successOrder.php');
            }else{
                $txt = "<span class='error'>Something Wrong!!</span> ";
                return $txt;
            }
        }
    }

    public static function countCustomerOrder($id){
        $sql = "SELECT * FROM `orders` WHERE `cusId` = '$id' AND status != '3' ORDER BY id DESC ";
        $res = Database::connect($sql);
        if($res != false){
            $row = mysqli_num_rows($res);
            return  $row;
        }else{
            return false;
        }
    }

    public static function getCustomerOrderProduct($id){
        $sql = "SELECT * FROM `orders` WHERE `cusId` = '$id' AND status != '3' ORDER BY id DESC ";
        $res = Database::connect($sql);
        if($res != false){
            $row = mysqli_num_rows($res);
            if($row == 0){
                return 0;
                die();
            }else{
                return $res;
            }
        }else{
            return false;
        }
    }
    //not use
    public static function getOrderQuantity($id){
        $sql = "SELECT `price` FROM `orders` WHERE `date` = NOW() ";
    }

    public static function getAllOrderProduct(){
        $sql = "SELECT orders.*,customers.name FROM orders INNER JOIN customers ON orders.cusId = customers.id ORDER BY orders.date DESC ";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }
    }

    public static function updateShiftOrder($id){
        $sql = "UPDATE `orders` SET `status` = '1' WHERE `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            return true;
        }else{
            return false;
        }
    }

    public static function confirmOrder($id){
        $sql = "UPDATE `orders` SET `status` = '3' WHERE `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            return true;
        }else{
            return false;
        }
    }

    public static function countNewOrder()
    {
        $sql = "SELECT * FROM `orders` WHERE `status` = 0 ";
        $res = Database::connect($sql);
        if($res != false)
        {
            $row = mysqli_num_rows($res);
            return $row;
        }
    }
}