<?php require_once 'header.php'?>
<?php
    use App\classes\Site;
    use App\classes\Session;
    $ob = Site::displayAllSiteData();
    $siteData = mysqli_fetch_assoc($ob);

?>
<h3 style="display: inline-block">Update logo and Footer</h3> <span style="color: red;margin-left: 30px;font-size: 18px"><?= Session::get("extNotmatch")?></span>
<span style="color: green;margin-left: 30px;font-size: 18px"><?= Session::get("updatesite")?></span>
<hr>
<div class="row">
    <div class="col-md-6">
        <form action="update.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">About Text : </label>
                <textarea name="abt_txt" id="" cols="30" rows="8" class="form-control">
                    <?=$siteData['abt_txt'] ?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Footer text : </label>
                <input type="text" class="form-control" name="footer-txt" value="<?=$siteData['footer_txt'] ?>">
            </div>
            <div class="form-group">
                <label for="">Logo : </label>
                <input type="file" class="form-control" name="logo">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="site-btn" value="Update">
            </div>
        </form>
    </div>
    <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="../Resources/Images/<?=$siteData['logo']?>" alt="" class="img-fluid">
        </div>
    </div>
</div>
</div>
<?php
Session::unsetSession('extNotmatch');
Session::unsetSession('updatesite');
?>
<?php require_once 'footer.php'?>
