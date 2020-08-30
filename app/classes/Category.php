<?php


namespace App\classes;
use App\classes\Session;
use App\classes\Database;
use App\classes\Helper;

class Category
{
    public static function addCategory($data){
        $catname = $data['catname'];
        $catname = Helper::filter($catname);
        $catname = mysqli_real_escape_string(Database::db(),$catname);
        if(empty($catname)){
            $txt = "<span class='error'>Field must not be empty!! </span> ";
            return $txt;
        }
        $sql = "INSERT INTO `categories`( `catname`) VALUES ('$catname')";
        $res = Database::connect($sql);
        if($res){
            $txt = "<span class='success'>Category save Successfully!</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Category not save !!</span> ";
            return $txt;
        }
    }
    public static function displayAllCategory(){
        $sql = "SELECT * FROM `categories` ORDER BY `id` DESC ";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }else{
            return false;
        }
    }
    public static function updateCategory($data){
      $catname = $data['catName'];
       $id = $data['id'];

        $sql = "UPDATE `categories` SET `catname` = '$catname' WHERE `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            $txt = "<span class='success'>Category Update Successfully!</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Category not Update!</span> ";
            return $txt;
        }
    }
    public static function deleteCategory($id){
        $sql = "DELETE FROM `categories` WHERE `id` = $id";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $dltTxt = "Successfully Delete!!";
            return $dltTxt;
        }else{
            $dltTxt = "Not Delete";
            return $dltTxt;
        }
    }
    public static function countCategoryProduct($id){
        $sql = "SELECT * FROM `products` WHERE cat_id = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $row = mysqli_num_rows($result);
            return $row;
        }else{
            return false;
        }
    }
    public static function countAllCategory(){
        $sql = "SELECT * FROM `categories` ";
        $res = Database::connect($sql);
        if($res != false){
            $count = mysqli_num_rows($res);
            return $count;
        }
    }

}