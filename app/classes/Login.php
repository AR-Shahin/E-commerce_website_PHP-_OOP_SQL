<?php


namespace App\classes;

use App\classes\Database;
use App\classes\Helper;
use App\classes\Session;
class Login
{
    public static function userCheck($data){
        $username = $data['username'];
        $username = Helper::filter($username);
        $username = mysqli_real_escape_string(Database::db(),$username);
        $password = $data['password'];
        $password = Helper::filter($password);
        $password = mysqli_real_escape_string(Database::db(),$password);
        if(empty($username) || empty($password)){
            $txt = "<span class='error'>Field Must not empty!</span> ";
            return $txt;
        }

        $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $row = mysqli_num_rows($res);
            if($row>0){
                Session::set('userlogin',1);
                Session::set('loginusername',"$username");
                header('location:index.php');
            }else{
                $txt = "<span class='error'>Invalid username or password!</span> ";
                return $txt;
            }
        }


    }


}