<?php require_once  'header.php'; ?>
<?php
use App\classes\Session;
use App\classes\Customer;
use App\classes\Order;
use App\classes\Helper;
#Session::init();
?>
<?php
if(!isset($_SESSION['login'])){
    header('location:login.php');
    die();
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
                        <li class="active">Order Page</li>
                    </ul>
                    <?php
                    $cmrId = Session::get('CustomerId');
                    if(Order::countCustomerOrder($cmrId) !=0) {
                    ?>
                    <table class="table-bordered table">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $cusId = Session::get('CustomerId');
                        $order = Order::getCustomerOrderProduct($cusId);
                        $i=0;
                        while ($orderData = mysqli_fetch_assoc($order)) { ?>
                        <tr>
                            <td><?= ++$i?></td>
                            <td><?= $orderData['productName'] ?></td>
                            <td><?= $orderData['quantity'] ?></td>
                            <td>$ <?= $orderData['price']  ?></td>
                            <td style="text-align: center"><img src="uploads/products/<?= $orderData['image'] ?>" alt="" style="width: 50px"></td>
                            <td><?= Helper::formatDate($orderData['date'])?></td>
                            <td style="text-align: center">
                                <?php
                                if($orderData['status'] == 0){
                                    echo 'Pending';
                                }elseif ($orderData['status'] == 1){
                                    echo ' Received';
                                }
                                ?>
                                </td>

                            <td style="text-align: center">
                                <?php
                                if($orderData['status'] == 1){ ?>
                                  <a href="logout.php?id=<?=$orderData['id']?>&page=orderpage" class="btn btn-sm btn-info">Confirm</a>
                            <?php    }elseif ($orderData['status'] == 0){
                                    echo 'N/A';
                                }
                                ?>
                            </td>
                        </tr>
                            <?php } ?>
                    </table>
                        <?php } else{ ?>
                        <h3 style="text-align: center;color: red;margin-top: 100px;">Order page is zero.</h3>
                        <div style="text-align: center">
                        <a href="index.php" class="btn btn-info">Go to Shopping Page</a></div>
                            <?php } ?>
                </div>
            </div></div>
    </div>
    <!-- MainBody End ============================= -->
    <!-- Footer ================================================================== -->
<?php
require_once  'footer.php';
?><?php
