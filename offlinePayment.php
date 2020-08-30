<?php require_once  'header.php'; ?>
<?php
use App\classes\Session;
use App\classes\Customer;
use App\classes\Order;
#Session::init();
?>
<?php
if(!isset($_SESSION['login'])){
    header('location:login.php');
    die();
}
?>
<?php
if(isset($_POST['up-btn'])){
 $upCus =  Customer::updateCustomer($_POST);
}
?>
<?php
if(isset($_GET['order'])){
    $cmrID = Session::get('CustomerId');
$order = \App\classes\Order::addOrder($cmrID);
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
                <!-- Sidebar ================================================== --><?php
                require_once  'sidebar.php';
                ?>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Offline Payment</li>
                    </ul>
                    <?php $email =  Session::get('CusEmail');
                    $cusDetails = Customer::customerData($email)->fetch_assoc();
                    ?>
                    <span><?= isset($upCus) ? $upCus : ''?></span>
                    <span><?= isset($order) ? $order : ''?></span>
                    <form class="form-horizontal"method="post" action="">

                        <h4>Your personal information</h4>
                        <div class="control-group">
                            <label class="control-label" for="inputFname1">Name <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" id="inputFname1" placeholder="Name" name="name" value="<?= $cusDetails['name']?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputFname1">City <sup>*</sup></label>
                            <div class="controls">
                                <input type="text"  name="city" placeholder="City" value="<?= $cusDetails['city']?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputFname1">Zip <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" name="zip" placeholder="Zip" value="<?= $cusDetails['zip']?>">
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" for="inputFname1">Address <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" name="address" placeholder="Address"value="<?= $cusDetails['address']?>">
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" for="inputFname1">Country <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" placeholder="Country" name="country" value="<?= $cusDetails['country']?>">
                            </div>
                        </div><div class="control-group">
                            <label class="control-label" for="inputFname1">Phone <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" placeholder="phone" name="phone"value="<?= $cusDetails['phone']?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="hidden" value="<?= $cusDetails['id']?>" name="id">
                                <input class="btn btn-large btn-success" type="submit" value="Update" name="up-btn"/>
                            </div>
                        </div>
                    </form>
                    <div style="text-align: right">
                    <a href="?order" class="btn btn-info">Confirm Order</a>
                    </div>
                </div>
            </div></div>
    </div>

<?php
require_once  'footer.php';
?>