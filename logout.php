<?php
require_once 'vendor/autoload.php';
use App\classes\Order;
use App\classes\Wishlist;
session_start();
if (isset($_GET['logout'])) {
    $cusid = \App\classes\Session::get('CustomerId');
    Wishlist::deleteAllCompare($cusid);
    session_destroy();
    header('location:index.php');
}
//Shifted product

if(isset($_GET['id']) && isset($_GET['page']) == 'orderpage'){
    $id =  $_GET['id'];
    $rtn = Order::confirmOrder($id);
    header('location:orderPage.php');
}

//DELETE COMPARE PRODUCT
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $dob = \App\classes\Wishlist::deleteSingleCompareProduct($pid);
    header('location:compare.php');
}
