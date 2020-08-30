<?php


namespace App\classes;
use App\classes\Session;
use App\classes\Database;
use App\classes\Helper;

class Brand
{
    public static function addBrand($data){
        $brandname = $data['brandname'];
        $brandname = Helper::filter($brandname);
        $brandname = mysqli_real_escape_string(Database::db(),$brandname);
        if(empty($brandname)){
            $txt = "<span class='error'>Field must not be empty!! </span> ";
            return $txt;
        }
        $sql = "INSERT INTO `brands`(`brandname`) VALUES ('$brandname')";
        $res = Database::connect($sql);
        if($res){
            $txt = "<span class='success'>Brand save Successfully!</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Brand not save !!</span> ";
            return $txt;
        }
    }
    public static function displayAllBrand(){
        $sql = "SELECT * FROM `brands` ORDER BY `id` DESC  ";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }else{
            return false;
        }
    }
    public static function updateBrand($data){
        $brandname = $data['brandName'];
        $id = $data['id'];

        $sql = "UPDATE `brands` SET `brandname` = '$brandname' WHERE `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            $txt = "<span class='success'>Brand Update Successfully!</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Brand not Update!</span> ";
            return $txt;
        }
    }
    public static function deleteBrand($id){
        $sql = "DELETE FROM `brands` WHERE `id` = $id";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $dltTxt = "Successfully Delete!!";
            return $dltTxt;
        }else{
            $dltTxt = "Not Delete";
            return $dltTxt;
        }
    }
}