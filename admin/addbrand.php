<?php require_once 'header.php' ;?>
<?php
use App\classes\Category;
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
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['brand-btn'])){
    $rtn = \App\classes\Brand::addBrand($_POST);
}
?>
<div class="row">
    <div class="col-12">
        <h3 style="display: inline-block;margin-right: 25px;">Add New Brand</h3>
        <?php
        if(isset($rtn)){
            echo $rtn;
        }
        ?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-6 offset-md-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="cat"><b>Brand Name : </b></label>
                <input type="text" class="form-control" placeholder="Category name" name="brandname">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Save Brand" name="brand-btn">
            </div>
        </form>
    </div>
</div>

<?php require_once 'footer.php' ;?>
