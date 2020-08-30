<?php
require_once '../vendor/autoload.php';
use App\classes\Session;


Session::init();
//CATEGORY UPDATE
if(isset($_POST['update-cat'])){
    $upCat = new \App\classes\Category();
    $result = $upCat->updateCategory($_POST);
    Session::set('uptxt',"$result");
    header('location:managecategory.php');
}

//CATEGORY UPDATE
if(isset($_POST['update-brand'])){
    $upBrand = new \App\classes\Brand();
    $result = $upBrand->updateBrand($_POST);
    Session::set('uptxt',"$result");
    header('location:managebrand.php');
}

//Product UPDATE
if(isset($_POST['update-product'])){
    $upProduct = new \App\classes\Product();
    $result = $upProduct->updateProduct($_POST);
    Session::set('updtxt',"$result");
    header('location:manageproduct.php');
}
?>