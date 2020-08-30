<?php
require_once  'header.php';
$login = \App\classes\Session::get('login');
if($login == true){
    header('location: order.php');
    die();
}
use App\classes\Customer;
?>
<?php
if(isset($_POST['log-btn'])){
    $logRtn = Customer::customerCheck($_POST);
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
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span6">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form  action="" method="post">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputEmail1" placeholder="Email" name="email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1" >Password</label>
				<div class="controls">
				  <input type="password" class="span3" name="password" id="inputPassword1" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn" name="log-btn">Sign in</button>
				</div>
			  </div>
			</form>
                <?= isset($logRtn) ? $logRtn : ''?> <br>
                <a href="forgetpass.html">Forget password?</a>
                <a href="register.php">Create an account</a>.
		</div>
		</div>
	</div>	
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
require_once  'footer.php';
?>