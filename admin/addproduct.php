<?php require_once 'header.php' ?>
<?php
use App\classes\Category;
use App\classes\Brand;
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
    <div class="col-12">
        <h3 style="display: inline-block;margin-right: 25px;">Add New Product</h3>
        <span><?= \App\classes\Session::get('uptxt')?></span>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <section class="card">
            <div class="card-body">
                <form method="post" action="insert.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Product Name" name="productname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category" id="" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                $c = Category::displayAllCategory();
                                while ($cat = mysqli_fetch_assoc($c)) { ?>
                                    <option value="<?= $cat['id']?>"><?= $cat['catname']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select name="brand" id="" class="form-control">
                                <option value="">Select Brand</option>
                                <?php
                                $b = Brand::displayAllBrand();
                                while ($brand = mysqli_fetch_assoc($b)) { ?>
                                    <option value="<?= $brand['id']?>"><?= $brand['brandname']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Product Price" name="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="product Quantity" name="quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <b>Description</b>
                        </div>
                        <div class="col-sm-9">
                                <textarea name="description" id="" cols="30" rows="10" class="summernote">
                                </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Featured
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                        General
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="3">
                                    <label class="form-check-label" for="gridRadios2">
                                        Top
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-block btn-success" value="Add Product" name="product-btn">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php
\App\classes\Session::unsetSession('uptxt');
?>
<?php require_once 'footer.php' ?>
