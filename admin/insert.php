<?php
require_once '../vendor/autoload.php';
use App\classes\Session;

Session::init();
//Add new product
if(isset($_POST['product-btn'])){
    $ob = new \App\classes\Product();
    $rtn = $ob->addNewProduct($_POST);
    Session::set('uptxt',"$rtn");
    header('location:addproduct.php');
}



?>