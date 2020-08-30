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
<div class="row">
    <div class="col-12">
        <h3 style="display: inline-block;margin-right: 25px;">Manage Categories</h3>
        <span class="error" "><b><?= \App\classes\Session::get('dltTxt')?></b></span>
        <span><b><?= \App\classes\Session::get('uptxt')?></b></span>
    </div>
</div>
    <hr>
 <div class="row">
     <div class="col-md-12">
         <table class="table table-hover table-striped text-center">
             <thead>
             <tr>
                 <th>SL</th>
                 <th>Category Name</th>
                 <th>Actions</th>
             </tr>
             </thead>
             <tbody>
             <?php
             $res = Category::displayAllCategory();
             $i = 0;
             while ($catData = mysqli_fetch_assoc($res)){ ?>
             <tr>
                 <td><?= ++$i?></td>
                 <td><?= ucwords($catData['catname'])?></td>
                 <td>
                     <a href="edit" class="btn btn-warning" data-toggle="modal" data-target="#id<?= $catData['id']?>"><i class="fa fa-pencil-square mr-1"></i> Edit</a>
                     <a href="delete.php?id=<?= $catData['id']?>&managecat" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a>

                 </td>
             </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
 </div>

<?php
$allData = Category::displayAllCategory();
while ($row = mysqli_fetch_assoc($allData)){ ?>
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label for="cat"><b>Category Name</b></label>
                            <input  type="text" class="form-control" value="<?= $row['catname']?>" name="catName">
                        </div>
                        <input type="hidden" value="<?= $row['id']?>" name="id">
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-block btn-success" name="update-cat">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
\App\classes\Session::unsetSession('dltTxt');
\App\classes\Session::unsetSession('uptxt');
?>
<?php require_once 'footer.php' ;?>