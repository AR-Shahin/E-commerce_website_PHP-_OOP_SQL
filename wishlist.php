<?php require_once 'header.php' ?>
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
                    <li class="active">Wishlist Product</li>
                </ul>
                <table class="table table-bordered">
                    <thead>
                    <div>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cusId = \App\classes\Session::get('CustomerId');
                    if( \App\classes\Wishlist::ViewWishProduct($cusId) === 0){
                        echo "<span class='error'>Not add!</span>";
                    }else{
                        $ob = \App\classes\Wishlist::ViewWishProduct($cusId);
                        $i=0;
                        while ($row = mysqli_fetch_assoc($ob)){
                            ?>

                            <tr>
                                <td><?= ++$i?></td>
                                <td><?= $row['name']?></td>
                                <td style="text-align: center"><img src="uploads/products/<?= $row['image']?>" alt="" style="width: 50px"></td>
                                <td style="text-align: center">
                                    <a href="product_details.php?id=<?= $row['id']?>" class="btn btn-info">View</a>
                                    <a href="logout.php?poid=<?= $row['id']?>&page=wishlist" class="btn btn-danger" onclick="return confirm('Are you sure ?')" >Delete</a>
                                </td>
                            </tr>
                        <?php  }  }?>

                    </tbody>
                </table>

            </div>
        </div></div>
</div>
<?php require_once 'footer.php' ?>
