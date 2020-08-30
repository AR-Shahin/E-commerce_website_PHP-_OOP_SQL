<?php


namespace App\classes;

use App\classes\Database;
use App\classes\Session;

class Customer
{
    public static function addNewCustomer($data){
        $name = $data['name'];
        $city = $data['city'];
        $zip = $data['zip'];
        $email = $data['email'];
        $address= $data['address'];
        $country = $data['country'];
        $phone = $data['phone'];
        $password = $data['password'];
        $password = md5($password);
        if(empty($name) || empty($city)|| empty($zip)|| empty($email)|| empty($address)|| empty($country)|| empty($phone)|| empty($password)){
            $txt = "<span class='error'>Field must not be empty!</span> ";
            return $txt;
        }else{
            if(self::doubleMailCheck($email) == false ) {
                $txt = "<span class='error'>Email Already Exists !</span> ";
                return $txt;
            } else {
                $sql = "INSERT INTO `customers`(`name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `password`) VALUES ('$name','$city','$zip','$email','$address','$country','$phone','$password')";
                $res = Database::connect($sql);
                if ($res != false) {
                    $txt = "<span class='success'>Registration Successfully!</span> ";
                    return $txt;
                } else {
                    $txt = "<span class='error'>Registration Not Successfully!</span> ";
                    return $txt;
                }
            }
        }
    }
public static function updateCustomer($data){
    $name = $data['name'];
    $id = $data['id'];
    $city = $data['city'];
    $zip = $data['zip'];
    $address= $data['address'];
    $country = $data['country'];
    $phone = $data['phone'];
    $sql  = "UPDATE `customers` SET `name` ='$name',`city`='$city',`zip`='$zip',`address`='$address',`country`='$country',`phone` ='$phone' WHERE `id` = '$id'";
    $res = Database::connect($sql);
    if($res != false){
        $txt = "<span class='success'>Updated Successfully!</span> ";
        return $txt;
    }else{
        $txt = "<span class='error'>Not Updated !</span> ";
        return $txt;
    }
}
    public static function doubleMailCheck($email){
        $sql = "SELECT * FROM `customers` WHERE  `email` = '$email'";
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

    public static function customerCheck($data){
        $email = $data['email'];
        $password = $data['password'];
        $password = md5($password);
        if(empty($email) || empty($password)){
            $txt = "<span class='error'>Field must not be empty!</span> ";
            return $txt;
        }else{
            $sql = "SELECT * FROM `customers` WHERE `email` = '$email' AND `password` = '$password'";
            $res = Database::connect($sql);
            if($res != false){
                $row = mysqli_num_rows($res);
                if($row == 0){
                    $txt = "<span class='error'>Invalid Email or Password!</span> ";
                    return $txt;
                }else{
                    Session::set('login',true);
                    $ob = self::customerData($email)->fetch_assoc();
                    #$ob->fetch_assoc();
                    $name = $ob['name'];
                    $cmrId = $ob['id'];
                    Session::set('UserName',$name);
                    Session::set('CusEmail',$email);
                    Session::set('CustomerId',$cmrId);
                    header('location:order.php');
                }
            }else{
                return  0;
            }
        }
    }
    public static function customerData($email){
        $sql = "SELECT * FROM `customers` WHERE email = '$email'";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }else{
            return false;
        }
    }

}