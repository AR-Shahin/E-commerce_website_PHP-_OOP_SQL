<?php require_once 'header.php'?>
<?php
use App\classes\Product;
use App\classes\Category;
use App\classes\Brand;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $ob = Product::singleProductByid($id);
    $singleProduct = mysqli_fetch_assoc($ob);
}

?>
<div class="row">
    <div class="col-12">
        <h3>Update Product</h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom: 8px;">
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for=""><b>Product Name : </b></label>
                                <input type="hidden" value="<?= $singleProduct['id'] ?>" name="id">
                                <input type="text" class="form-control" name="productname" value="<?= $singleProduct['name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for=""><b>Image : </b></label>
                                <input type="file" class="form-control" name="image" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 8px;">
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for=""><b>Category Name : </b></label>
                                <select name="catname" id="" class="form-control">
                                    <?php
                                    $c = Category::displayAllCategory();
                                    while ($cat = mysqli_fetch_assoc($c)) { ?>

                                        <option value="<?= $cat['id'] ?>" <?= $singleProduct['cat_id']== $cat['id'] ? 'selected' : ''?>><?= $cat['catname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for=""><b>Brand Name : </b></label>
                                <select name="brandname" id="" class="form-control">
                                    <?php
                                    $b = Brand::displayAllBrand();
                                    while ($brand = mysqli_fetch_assoc($b)) { ?>
                                        <option value="<?= $brand['id'] ?>" <?= $singleProduct['brand_id']== $brand['id'] ? 'selected' : ''?> > <?= $brand['brandname'] ?>  </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 8px;">
                        <div class="col-md-6">
                            <label for=""><b>Price : </b></label>
                            <input type="text" class="form-control" name="price" value="<?= $singleProduct['price'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Avilable Quantity : </b></label>
                            <input type="text" class="form-control" name="quantity" value="<?= $singleProduct['quantity'] ?>">
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 8px;">
                        <div class="col-md-12">
                            <label for=""><b>Description : </b></label>
                            <textarea name="description" id="" cols="30" rows="10" class="summernote">
                                <?= $singleProduct['description'] ?>
                                </textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="margin-bottom: 8px;margin-top: 10px;">
                        <div class="col-md-8">
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><b>Status : </b></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" <?= $singleProduct['status'] == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="gridRadios1">
                                                Featured
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="2" <?= $singleProduct['status'] == 2 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="gridRadios2">
                                                General
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="3" <?= $singleProduct['status'] == 3 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="gridRadios2">
                                                Top
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <img src="../uploads/products/<?= $singleProduct['image'] ?>" alt="" class="w-25">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 8px;">
                        <div class="col-12">
                            <input type="submit" class="btn btn-block btn-success" value="Update" name="update-product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'?>
