<?php require_once 'header.php' ?>
<?php
use App\classes\Product;
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
                <span><b><?= \App\classes\Session::get('dltTxt')?></b></span>
                <span><b><?= \App\classes\Session::get('upTxt')?></b></span>
                <span><b><?= \App\classes\Session::get('updTxt')?></b></span>
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
                            <th>Category</th>
                            <th >Brand</th>
                            <th >Price</th>
                            <th >Quantity</th>
                            <th >Image</th>
                            <th >Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ob = Product::displayAllProduct();
                        $i =0;
                        while ($product = mysqli_fetch_assoc($ob)) {  ?>
                            <tr>
                                <td><?= ++$i?></td>
                                <td><?= ucwords($product['name']) ?></td>
                                <td><?= ucwords($product['catname']) ?></td>
                                <td><?= ucwords($product['brandname']) ?></td>
                                <td>$ <?= $product['price'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td>
                                    <img src="../uploads/products/<?= $product['image'] ?>" alt="" style="width: 50px">
                                </td>
                                <td>
                                    <?php
                                    if($product['status'] == 1){
                                        echo '<span class="badge badge-success">
Feature</span>';
                                    }elseif ($product['status'] == 2){
                                        echo '<span class="badge badge-secondary">General</span>';
                                    }else{
                                        echo '<span class="badge badge-primary">Top</span>';
                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?= $product['id']?>"><i class="fa fa-eye"></i> View</a>
                                    <a href="updateproduct.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square"></i> Edit</a>
                                    <a href="delete.php?id=<?= base64_encode($product['id'])?>&manageproduct" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a>
                                    <?php
                                    if($product['status'] != 3) { ?>
                                        <a href="status.php?id=<?= $product['id']?>&manageproduct&maketop" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-up"></i> Top</a>
                                    <?php } ?>
                                    <?php
                                    if($product['status'] == 3) { ?>
                                        <a href="status.php?id=<?= $product['id']?>&manageproduct&makegeneral" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-down mr-1"></i> General</a>
                                    <?php } ?>

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
<!-- VIEW PRODUCT -->
<?php
$ob = Product::displayAllProduct();
while ($product = mysqli_fetch_assoc($ob)) {  ?>
    <div class="modal fade " id="id<?= $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Title : <?= ucwords($product['name'])?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                        <tr>
                            <th>Category</th>
                            <td><?= strtoupper($product['catname'])?></td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td><?= strtoupper($product['brandname'])?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <?php
                                if($product['status'] == 1){
                                    echo '<span class="badge badge-success">Featured</span>';
                                }elseif ($product['status'] == 2){
                                    echo '<span class="badge badge-secondary">General</span>';
                                }else{
                                    echo '<span class="badge badge-primary">Top</span>';
                                } ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td><?= $product['date']?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?= $product['price']?></td>
                        </tr>
                        <tr>
                            <th>Avilable Quantity</th>
                            <td><?= $product['quantity']?></td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td><?= $product['description']?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td class="text-center"><img width="200px" src="../uploads/products/<?= $product['image']?>" alt=""></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php  } ?>
<?php
\App\classes\Session::unsetSession('dltTxt');
\App\classes\Session::unsetSession('upTxt');
\App\classes\Session::unsetSession('updTxt');
?>
<?php require_once 'footer.php' ?>
