<?php require_once 'header.php' ?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php require_once 'sidebar.php' ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Cat wise </li>
    </ul>
	<hr class="soft"/>

	<div id="myTab" class="pull-right">
	 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
	 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
        <br>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
        <?php
        if(isset($_GET['cid'])){
            $id = $_GET['cid'];
        }
        $cob = \App\classes\Product::allProductByCatId($id);
        while ($Cpro = $cob->fetch_assoc()){ ?>
		<div class="row">	  
			<div class="span2">
			<img src="uploads/products/<?= $Cpro['image'] ?>" alt=""/>
			</div>
			<div class="span4">
				<h5><?= $Cpro['name'] ?></h5>
				<p>
                    <?= \App\classes\Helper::textShorten($Cpro['description'],100) ?>
				</p>
				<a class="btn btn-small pull-right" href="product_details.php?id=<?= $Cpro['id'] ?>">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $ <?= $Cpro['price'] ?></h3>
			  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
			  <a href="product_details.php?id=<?= $Cpro['id'] ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				</form>
			</div>
	</div>
	<hr class="soft"/>
<?php } ?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
<?php
if(isset($_GET['cid'])){
    $id = $_GET['cid'];
}
$cob = \App\classes\Product::allProductByCatId($id);
while ($Cpro = $cob->fetch_assoc()){ ?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.php?id=<?= $Cpro['id'] ?>"><img src="uploads/products/<?= $Cpro['image'] ?>"style="height: 160px" alt=""/></a>
				<div class="caption">
				  <h5><?= $Cpro['name'] ?></h5>
                    <p>
                        <?= \App\classes\Helper::textShorten($Cpro['description'],100) ?>
                    </p>
                    <h4><a class="btn" href="product_details.php?id=<?= $Cpro['id'] ?>">VIEW</a> <span class="pull-right">$ <?= $Cpro['price'] ?></span></h4>
				</div>
			  </div>
			</li>
<?php } ?>
		  </ul>


	<hr class="soft"/>
	</div>
</div>
	<div class="pagination">
		<ul>
		<li><a href="#">&lsaquo;</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">...</a></li>
		<li><a href="#">&rsaquo;</a></li>
		</ul>
	</div>
<br class="clr"/>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php require_once 'footer.php' ?>