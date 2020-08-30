<?php require_once 'header.php';?>
<?php
use App\classes\Order;
?>
<?php
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
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                <h3 style="margin-right: 25px;padding: 0px;display: inline-block">Manage All Products</h3>
                <span><?= \App\classes\Session::get('UpOr')?></span>
                <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped table-hover" id="dynamic-table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th >Price</th>
                            <th >Image</th>
                            <th >Order Date</th>
                            <th >Customer Details </th>
                            <th >Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ob = Order::getAllOrderProduct();
                        $i = 0;
                            while ($order = mysqli_fetch_assoc($ob)){ ?>
                        <tr>
                            <td><?= ++$i?></td>
                            <td><a href="<?= $order['productId']?>"><?= $order['productName']?></a></td>
                            <td><?= $order['quantity']?></td>
                            <td><?= $order['price']?></td>
                            <td>
                                <img src="../uploads/products/<?= $order['image']?>" alt="" width="50px">
                            </td>
                            <td><?=\App\classes\Helper::formatDate($order['date'])?></td>
                            <td><?= $order['name']?></td>
                            <td>
                                <?php
                                if($order['status'] == 0){
                                    echo 'New';
                                }
                                elseif($order['status'] == 1){
                                    echo 'Shifted';
                                }else{
                                    echo 'Confirmed';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($order['status'] == 0){ ?>
                                  <a href="status.php?id=<?=$order['id']?>&page=manageorder" class="btn btn-warning btn-sm">Shift</a>
                              <?php  }
                                elseif($order['status'] == 1){
                                    echo '<a href="javascript:;" class="btn btn-info btn-sm">Sent</a>';
                                }else{
                                    echo '<a href="javascript:;" class="btn btn-success btn-sm">Received</a>';                                }
                                ?>
                            </td>

                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
\App\classes\Session::unsetSession('UpOr');
?>
<?php require_once 'footer.php';?>
