<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>

<?php //require_once 'Template/NavBar.php';           ?>

<?php
require_once '../Classes/Product.inc';
require_once '../Classes/Functions.inc';
?>
<?php
$post = new Product();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post = ProductController::FindOneProduct($_GET['id']);
    $cm = 'edit';
}
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form action="OperateProduct.php" method="POST" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ProductId' name='ProductId' value='$post->ProductId' />" : ''; ?>
            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف محصول جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Title">
                                    عنوان  :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="Title" class="form-control" id="Title" placeholder="عنوان سمت را وارد کنید" value="<?php echo $cm == 'edit' ? $post->Title : '' ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Description">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="Description" class="form-control" id="Description" placeholder="عنوان سمت را وارد کنید" value="<?php echo $cm == 'edit' ? $post->Description : '' ?>"/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-sm-3" for="ProductCategory">
                                    دسته:
                                </label>
                                <div class="col-sm-9">
                                    <select name="ProductCategory" id="ProductCategory" class="form-control" >
                                        <?php
                                        $expertparents = ProductCategoryController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($post->ProductCategory->ProductCategoryId == $expertparent->ProductCategoryId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            echo "<option value='" . $expertparent->ProductCategoryId . "' " . $selected . ">" . $expertparent->ProductCategoryId . " : " . $expertparent->Title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-sm-3" for="ProductLevel">
                                    سطح محصول:
                                </label>
                                <div class="col-sm-9">
                                    <select name="ProductLevel" id="ProductLevel" class="form-control" >
                                        <?php
                                        $expertparents = ProductLevelController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($post->ProductLevel->ProductLevelId == $expertparent->ProductLevelId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            echo "<option value='" . $expertparent->ProductLevelId . "' " . $selected . ">" . $expertparent->ProductLevelId . " : " . $expertparent->Title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3" for="ProductMediaType">
                                    نوع رسانه:
                                </label>
                                <div class="col-sm-9">
                                    <select name="ProductMediaType" id="ProductMediaType" class="form-control" >
                                        <?php
                                        $expertparents = ProductMediaTypeController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($post->ProductMediaType->ProductMediaTypeId == $expertparent->ProductMediaTypeId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            echo "<option value='" . $expertparent->ProductMediaTypeId . "' " . $selected . ">" . $expertparent->ProductMediaTypeId . " : " . $expertparent->Title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>







                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertProduct" />  
                                    <a class="btn btn-light-orange" href="Products.php?lessonid=<?php echo $_GET['lessonid'] ?>">
                                        <span class="glyphicon glyphicon glyphicon-remove-sign"></span>
                                        انصراف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php
include_once 'Template/LeftSideBar.php';
include_once 'Template/Footer.php';
?>
