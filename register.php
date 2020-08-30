<?php require_once 'header.php'; ?>
<?php
$login = \App\classes\Session::get('login');
if($login == true){
    header('location: order.php');
    die();
}
?>
<?php
use App\classes\Customer;
if(isset($_POST['reg-btn'])){
    $rtnTxt = Customer::addNewCustomer($_POST);
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
<?php
if(isset($_POST['log-btn'])){
    $logRtn = Customer::customerCheck($_POST);
}
?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
        <?php require_once 'sidebar.php'; ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>
        <?= isset($rtnTxt) ? $rtnTxt : '' ?>
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
        <style>
            sup{
                color: red;
                font-size: 12px;
            }
        </style>
	<form class="form-horizontal"method="post" action="">
		<h4>Your personal information</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder="Name" name="name">
			</div>
		 </div>
        <div class="control-group">
            <label class="control-label" for="inputFname1">Email <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="inputFname1" placeholder="Email" name="email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputFname1">City <sup>*</sup></label>
            <div class="controls">
                <input type="text"  name="city" placeholder="City">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputFname1">Zip <sup>*</sup></label>
            <div class="controls">
                <input type="text" name="zip" placeholder="Zip">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Address <sup>*</sup></label>
            <div class="controls">
                <input type="text" name="address" placeholder="Address">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Country <sup>*</sup></label>
            <div class="controls">
                <input type="text" placeholder="Country" name="country">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Phone <sup>*</sup></label>
            <div class="controls">
                <input type="text" placeholder="phone" name="phone">
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputFname1">Password <sup>*</sup></label>
            <div class="controls">
                <input type="text" placeholder="password" name="password">
            </div>
        </div>
	<div class="control-group">
			<div class="controls">

				<input class="btn btn-large btn-success" type="submit" value="Register" name="reg-btn"/>
			</div>
		</div>		
	</form>
        <a href="login.php" class="btn btn-info">Log in</a>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php require_once 'footer.php'; ?>