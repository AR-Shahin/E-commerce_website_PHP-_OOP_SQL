<?php

namespace App\classes;

use App\classes\Database;
use App\classes\Helper;
use App\classes\Session;

class Product
{
    public static function addNewProduct($data){
        $productname = $data['productname'];
        $productname = Helper::filter($productname);
        $productname = mysqli_real_escape_string(Database::db(),$productname);
        $price = $data['price'];
        $cat_id = $data['category'];
        $brand_id = $data['brand'];
        $quantity = $data['quantity'];
        $description= $data['description'];
        $description = Helper::filter($description);
        $description = mysqli_real_escape_string(Database::db(),$description);
        $status = $data['status'];
        $image = $_FILES['image']['name'];
        if(empty($productname) || empty($price) ||  empty($cat_id) || empty($brand_id) || empty($quantity) || empty($description) || empty($status) || empty($image)){
            $txt = "<span class='error'>Field must not be empty!! </span> ";
            return $txt;
        }
        $permit = array('png','jpg','jpeg');
        $ext = explode('.',$image);
        $ext = strtolower(end($ext));
        if(in_array($ext,$permit) === false){
            $txt = "<span class='error'>You can upload only : " .implode(' , ',$permit) . " format !!</span> ";
            return $txt;
        }
        $image = substr(md5(time()),0,10) . '.' .$ext;
        $sql = "INSERT INTO `products`(`name`, `price`, `cat_id`, `brand_id`, `description`, `status`, `quantity`,`image`) VALUES ('$productname','$price','$cat_id','$brand_id','$description','$status','$quantity','$image')";
        $res = Database::connect($sql);
        if($res != false){
            $upload = '../uploads/products/' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $txt = "<span class='success'>Product Added Successfully !! </span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Product not Add !!</span> ";
            return $txt;
        }

    }

    public static function displayAllProduct()
    {
        $sql = "SELECT products.*,categories.catname,brands.brandname FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN brands ON brands.id = products.brand_id ORDER BY products.id DESC ";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }else{
            false;
        }
    }

    public static function deleteProduct($id){
        $imgName =  self::findSingleImage($id);
        $path = '../uploads/products/'.$imgName;
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        $res = mysqli_query(Database::db(),$sql);
        if($res){
            $txt = "<span class='success'>Deleted Product Successfully !</span> ";
            unlink($path);
            return $txt;
        }else{
            $txt = "Not Delete";
            return $txt;
        }
    }

    public static function updateProduct($data){
        $productname = $data['productname'];
        $productname = Helper::filter($productname);
        $productname = mysqli_real_escape_string(Database::db(),$productname);
        $price = $data['price'];
        $cat_id = $data['catname'];
        $brand_id = $data['brandname'];
        $quantity = $data['quantity'];
        $description= $data['description'];
        $description = Helper::filter($description);
        $description = mysqli_real_escape_string(Database::db(),$description);
        $status = $data['status'];
        $id = $data['id'];
        if($_FILES['image']['name'] == NULL){
            $sql = "UPDATE `products` SET  `name` = '$productname', `price`= '$price',`cat_id`= '$cat_id',`brand_id`= '$brand_id',`description`= '$description',`status`= '$status',`quantity`= '$quantity' WHERE `id` = '$id' ";
        }else{
            $path=  self::findSingleImage($id);
            $dltImg = '../uploads/products/'. $path;
            unlink($dltImg);
            $image = $_FILES['image']['name'];
            $permit = array('png','jpg','jpeg');
            $ext = explode('.',$image);
            $ext = strtolower(end($ext));
            if(in_array($ext,$permit) === false){
                $txt = "<span class='error'>You can upload only : " .implode(' , ',$permit) . " format !!</span> ";
                return $txt;
            }
            $image = substr(md5(time()),0,10) . '.' .$ext;
            $sql = "UPDATE `products` SET  `name` = '$productname', `price`= '$price',`cat_id`= '$cat_id',`brand_id`= '$brand_id',`description`= '$description',`status`= '$status',`quantity`= '$quantity',`image`= '$image' WHERE `id` = '$id'";
        }
        $res = Database::connect($sql);
        if($res != false){
            $upload = '../uploads/products/' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            $txt = "<span class='success'>Product Updated Successfully !! </span> ";

            return $txt;
        }else{
            $txt = "<span class='error'>Product not Update !!</span> ";
            return $txt;
        }
    }

    public static function makeTop($id){
        $sql = "UPDATE `products` SET `status` = '3' WHERE `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            $txt = "<span class='success'>Updated in Top Product !</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Not Updated!</span> ";
            return $txt;
        }
    }

    public static function makeGeneral($id){
        $sql = "UPDATE `products` SET `status` = '2' WHERE `id` = '$id'";
        $res = Database::connect($sql);
        if($res != false){
            $txt = "<span class='success'>Updated in General Product !</span> ";
            return $txt;
        }else{
            $txt = "<span class='error'>Not Updated!</span> ";
            return $txt;
        }
    }

    public static function findSingleImage($id){
        $sql = "SELECT `image` FROM `products` WHERE `id` = $id";
        $result = mysqli_query(Database::db(),$sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            $path = $data['image'];
            return $path;
        }else{
            return false;
        }
    }

    public static function singleProductByid($id){
        $sql = "SELECT products.*,categories.catname,brands.brandname FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN brands ON brands.id = products.brand_id WHERE products.id = $id ";
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

    public static function allFeatureProduct(){
        $sql = "SELECT products.*,categories.catname,brands.brandname FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN brands ON brands.id = products.brand_id WHERE products.status = 1 ORDER BY products.id DESC LIMIT 4";
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

    public static function allTopProduct(){
        $sql = "SELECT products.*,categories.catname,brands.brandname FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN brands ON brands.id = products.brand_id WHERE products.status = 3 LIMIT 8";
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
    public static function allProductByCatId($id){
        $sql = "SELECT products.*,categories.catname,brands.brandname FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN brands ON brands.id = products.brand_id WHERE categories.id = $id ORDER BY id DESC ";
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
    public static function countFeatureProduct(){
        $sql = "SELECT * FROM `products` WHERE `status`= 1 ";
        $res = Database::connect($sql);
        if($res != false){
            $count = mysqli_num_rows($res);
            return $count;
        }
    }
    public static function countAllProduct(){
        $sql = "SELECT * FROM `products` ";
        $res = Database::connect($sql);
        if($res != false){
            $count = mysqli_num_rows($res);
            return $count;
        }
    }

    public static function countAllProductQuantity(){
        $sql = "SELECT (`quantity`) FROM `products`  ";
        $res = Database::connect($sql);
        $sum = 0;
        while ($row = mysqli_fetch_assoc($res)){
            $sum += $row['quantity'];
        }
        return $sum;
    }
    public static function paginationWiseShow($start,$limit){

        $sql = "
SELECT products.*,categories.catname,brands.brandname FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN brands ON brands.id = products.brand_id ORDER BY products.id DESC LIMIT $start,$limit ";
        $res = Database::connect($sql);
        if($res != false){
            return $res;
        }else{
            false;
        }
    }
}
