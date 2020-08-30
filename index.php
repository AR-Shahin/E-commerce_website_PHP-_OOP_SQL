<?php require_once 'header.php'; ?>
<?php require_once 'slider.php'; ?>
<?php
//pagination
$start = 0;
$limit = 6;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $start = ( $page - 1 ) * $limit;
}
$totalpage = ceil(\App\classes\Product::countAllProduct() / $limit);
if($totalpage < $page)
{
    header("location:index.php");
}
?>
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <?php require_once'sidebar.php' ?>
                <div class="span9">
                    <div class="well well-small">
                        <h4>Featured Products <small class="pull-right"><?=  \App\classes\Product::countFeatureProduct()-1?>+&nbsp;featured products</small></h4>
                        <div class="row-fluid">
                            <div class="item">
                                <ul class="thumbnails">
                                    <?php
                                    $obF = \App\classes\Product::allFeatureProduct();
                                    while ($Fproduct = $obF->fetch_assoc()) { ?>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <a href="product_details.php?id=<?= $Fproduct['id'] ?>"><img src="uploads/products/<?= $Fproduct['image'] ?>" alt=""></a>
                                                <div class="caption">
                                                    <h5><?= substr($Fproduct['name'],0,20) ?></h5>
                                                    <h4><a class="btn" href="product_details.php?id=<?= $Fproduct['id'] ?>">VIEW</a> <span class="pull-right">$ <?= $Fproduct['price'] ?></span></h4>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h4>Latest Products </h4>

                    <ul class="thumbnails">
                        <?php
                        $obA = \App\classes\Product::paginationWiseShow($start,$limit);
                        while ($Aproduct = $obA->fetch_assoc()) { ?>
                            <li class="span3">
                                <div class="thumbnail">
                                    <a  href="product_details.php?id=<?= $Aproduct['id'] ?>"><img src="uploads/products/<?= $Aproduct['image'] ?>" alt="" style="height: 160px"/></a>
                                    <div class="caption">
                                        <h5><?= substr($Aproduct['name'],0,30) ?></h5>
                                        <p>
                                            <?= \App\classes\Helper::textShorten($Aproduct['description'],50) ?>
                                        </p>

                                        <h4 style="text-align:center"> <a class="btn" href="product_details.php?id=<?= $Aproduct['id'] ?>">VIEW</a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$<?= $Aproduct['price'] ?></a></h4>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- pagination -->
                    <div class="pagination" style="text-align: right;">
                        <ul>
                            <?php if ($page>1){ ?>
                                <li><a href="index.php?page=<?=$page - 1;?>""> Prev</a></li>
                            <?php } ?>
                            <?php
                            for($i=1;$i<=$totalpage;$i++){ ?>
                                <li ><a href="index.php?page=<?=$i?>"><?= $i?></a></li>
                            <?php } ?>
                            <?php if($totalpage > $page) { ?>
                                <li><a href="index.php?page=<?=$page + 1;?>">Next</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>