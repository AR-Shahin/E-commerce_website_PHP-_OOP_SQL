<?php
require_once '../vendor/autoload.php';
use App\classes\Database;
use  App\classes\Session;
use App\classes\Order;
Session::init();

//Make top product
if(isset($_GET['maketop']) && isset($_GET['manageproduct'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Product();
   $rtn = $status->makeTop($id);
    Session::set('upTxt',"$rtn");
    header('location:manageproduct.php');
}

//Make general product
if(isset($_GET['makegeneral']) && isset($_GET['manageproduct'])){
    $id =  $_GET['id'];
    $status = new \App\classes\Product();
    $rtn = $status->makeGeneral($id);
    Session::set('upTxt',"$rtn");
    header('location:manageproduct.php');
}
//Shifted product

if(isset($_GET['id']) && isset($_GET['page']) == 'manageorder'){
    $id =  $_GET['id'];
    $rtn = Order::updateShiftOrder($id);
    if($rtn == true){
        $txt = "<span class='success'>Product Shifted successfully!!</span>";
        Session::set('UpOr',$txt);
    }else{
        $txt = "<span class='error'>Product Not  Shifted</span>";
        Session::set('UpOr',$txt);
    }
    header('location:manageorder.php');
}

?>
