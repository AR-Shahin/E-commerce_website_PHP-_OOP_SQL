<?php
use App\classes\Session;
?>
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"><?= Session::get('Qty') ?> Items in your cart  <span class="badge badge-warning pull-right">$ <?= Session::get('Total') ?> </span></a></div>
		<h5>Category</h5>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
            <?php
            $Cob = \App\classes\Category::displayAllCategory();
            while ($cat = $Cob->fetch_assoc()){ ?>
			<li><a href="catwise.php?cid=<?= $cat['id']?>"><?= $cat['catname']?> (<?= \App\classes\Category::countCategoryProduct($cat['id'])?>)</a></li>
		<?php } ?>
		</ul>
		<br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->