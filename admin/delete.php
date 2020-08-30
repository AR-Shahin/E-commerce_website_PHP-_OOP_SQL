<?php
require_once '../vendor/autoload.php';
use App\classes\Session;
use App\classes\Category;
Session::init();


//DELETE CATEGORY
if(isset($_GET['managecat'])){
    $id = $_GET['id'];
    $dlt = new \App\classes\Category();
    $dltTxt = $dlt->deleteCategory($id);
    Session::set('dltTxt',"$dltTxt");
    header('location:managecategory.php');
}

//DELETE Brand
if(isset($_GET['managebrand'])){
    $id = $_GET['id'];
    $dlt = new \App\classes\Brand();
    $dltTxt = $dlt->deleteBrand($id);
    Session::set('dltTxt',"$dltTxt");
    header('location:managebrand.php');
}

//DELECT PRODUCT
if(isset($_GET['manageproduct'])){
    $id = base64_decode($_GET['id']);
    $dlt = new \App\classes\Product();
    $dltTxt = $dlt->deleteProduct($id);
    Session::set('dltTxt',"$dltTxt");
    header('location:manageproduct.php');
}
?>