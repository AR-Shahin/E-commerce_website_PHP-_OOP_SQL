<?php
require_once 'vendor/autoload.php';
use App\classes\Session;
use App\classes\Product;
use App\classes\Cart;
use App\classes\Category;
use App\classes\Brand;
use App\classes\Helper;
use App\classes\Customer;
use  App\classes\Order;
ob_start();
Session::init();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
     <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
     <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
     <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
     -->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
    <script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>
<body>
<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">

            <div class="span6">Welcome!<strong> <?= Session::get('UserName')?></strong></div>

            <div class="span6">
                <div class="pull-right">
		<span class="btn btn-mini">$<?=
            $total =  Session::get('Total');
            ?></span>
                    <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?= Session::get('Qty') ?> ] Itemes in your cart </span> </a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
                <form class="form-inline navbar-search" method="post" action="products.html" style="text-align: center">
                    <input id="srchFld" class="srchTxt" type="text" />
                    <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="products.php">Products</a></li>
                    <?php
                    if(Cart::countCartProduct() != 0) { ?>
                    <li class=""><a href="product_summary.php">Cart</a></li>
                    <?php } ?>
                    <?php
                    $cmrId = Session::get('CustomerId');
                    if(isset($_SESSION['login'])){?>
                    <li class=""><a href="orderPage.php">Order Page</a></li>
                    <li class=""><a href="compare.php">Compare Page</a></li>
                    <li class=""><a href="wishlist.php">Wish List</a></li>
                    <?php } ?>
                    <li class=""><a href="contact.php">Contact</a></li>
                    <li class="">
                        <?php
                        $login = \App\classes\Session::get('login');
                        if($login == false){ ?>
                            <a href="login.php"style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                        <?php  }else{ ?>
                            <a href="logout.php?logout" style="padding-right:0"><span class="btn btn-large btn-danger">Logout</span></a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header End====================================================================== -->