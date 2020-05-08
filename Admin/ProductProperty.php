<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>

<?php require_once '../Classes/Functions.inc'; ?>

<?php //require_once 'Template/NavBar.php';                  ?>
<?php require_once '../Classes/ProductProperty.inc'; ?>
<?php
$expert = new ProductProperty();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $expert = ProductPropertyController::FindOneProductProperty($_GET['id']);
    $cm = 'edit';
    //echo $expert->Parent . "<br>";
}
?>






<main class="container-fluid fixed-nav-offset">

    <div class="row">
        <form action="OperateProductProperty.php" method="POST" role="form" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ProductPropertyId' name='ProductPropertyId' value='$expert->ProductPropertyId' />" : ''; ?>
            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف مهارت جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Title">
                                    عنوان  :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Title" placeholder="عنوان  را وارد کنید" name="Title" value="<?php echo $cm == 'edit' ? $expert->Title : '' ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Values">
                                    مقادیر  :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Values" placeholder="مقادیر را وارد کنید" name="Values" value="<?php echo $cm == 'edit' ? $expert->Title : '' ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Description">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="Description" placeholder="توضیحات را وارد کنید" name="Description"><?php echo $cm == 'edit' ? $expert->Description : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertProductProperty" />
                                    <a class="btn btn-light-orange" href="ProductCategories.php" >
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