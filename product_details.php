<?php require_once 'header.php'?>
<?php
use App\classes\Wishlist;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Sob = \App\classes\Product::singleProductByid($id);
    $Sproduct = $Sob->fetch_assoc();
}
?>
<?php
if(isset($_POST['cart-btn'])){
    $addCart = \App\classes\Cart::addToCart($_POST);
    if($addCart == true){
        header('location:product_summary.php');
    }
    if($addCart == 0){
        $addCart = "<span class='error'>Product Already added to Add !</span>";
    }


}
?>
    <style>
        .error{
            color: red;
            font-size: 16px;
        }
        .success{
            color: green;
            font-size: 16px;
        }
    </style>
    <div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <?php require_once 'sidebar.php' ?>
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li><a href="products.php">Products</a> <span class="divider">/</span></li>
                    <li class="active">product Details</li>
                </ul>
                <div class="row">
                    <div id="gallery" class="span3">
                        <a href="uploads/products/<?=$Sproduct['image']?>" title="<?=$Sproduct['name']?>">
                            <img src="uploads/products/<?=$Sproduct['image']?>" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
                        </a>
                    </div>
                    <?php
                    if(isset($_GET['compare']) && isset($_GET['id'])){
                        $pid =  $_GET['id'];
                        $cusId = \App\classes\Session::get('CustomerId');
                        $rtn_wish = Wishlist::addCompareProduct($pid,$cusId);
                    }
                    ?>
                     <?php
                    if(isset($_GET['wishlist']) && isset($_GET['id'])){
                        $pid =  $_GET['id'];
                        $cusId = \App\classes\Session::get('CustomerId');
                        $rtn_wish = Wishlist::addWishlistProduct($pid,$cusId);
                    }
                    ?>
                    <div class="span6">
                        <h3><?=$Sproduct['name']?>  </h3>
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm" method="post">
                            <div class="control-group">
                                <label class="control-label"><span>$ <?=$Sproduct['price']?></span></label>
                                <div class="controls">
                                    <input type="number" class="span1" placeholder="Qty." value="1" name="quantity"/>
                                    <input type="hidden" value="<?=$Sproduct['id']?>" name="pid">

                                    <button name="cart-btn" type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
                                    <br> <br>
                                    <?php
                                    if(isset($_SESSION['login'])){?>
                                    <div style="text-align: right">
                                    <a href="?id=<?=$Sproduct['id']?>&compare" class="btn btn-info">Add to Compare</a>
                                    <a href="?id=<?=$Sproduct['id']?>&wishlist" class="btn btn-warning">Add to Wishlist</a>
                                    </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </form>
                        <span>
                            <?= isset($addCart) ? $addCart : '';?>
                            <?= isset($rtn_wish) ? $rtn_wish : '';?>
                        </span>
                        <hr class="soft"/>
                        <h4><?=$Sproduct['quantity']?> items in stock</h4>
                        <hr>
                        <table class="table table-borderd">
                            <tr>
                                <th>Category </th>
                                <td><?=$Sproduct['catname']?></td>
                            </tr>
                            <tr>
                                <th>Brand </th>
                                <td><?=$Sproduct['brandname']?></td>
                            </tr>
                        </table>

                        <hr class="soft clr"/>
                        <p>
                            <?=$Sproduct['description']?>
                        </p>
                        <br class="clr"/>
                    </div>
                </div>
            </div> </div>
    </div>
    <!-- MainBody End ============================= -->
<?php require_once 'footer.php'?>