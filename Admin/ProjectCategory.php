
<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>


<?php require_once '../Classes/Functions.inc'; ?>
<?php require_once '../Classes/ProjectCategory.inc'; ?>
<?php
$expert = new ProjectCategory();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $expert = ProjectCategoryController::FindOneProjectCategory($_GET['id']);
    $cm = 'edit';
    //echo $expert->Parent . "<br>";
}
?>






<main class="container-fluid fixed-nav-offset">

    <div class="row">
        <form action="OperateProjectCategory.php" method="POST" role="form" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ProjectCategoryId' name='ProjectCategoryId' value='$expert->ProjectCategoryId' />" : ''; ?>
            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف مهارت جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Parent">
                                    سر شاخه :
                                </label>
                                <div class="col-sm-9">
                                    <select name="Parent" id="Parent" class="form-control" >
                                        <option value="0" > هیچ کدام</option>
                                        <?php
                                        
                                        
                                        $expertparents = ProjectCategoryController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($expert->Parent == $expertparent->ProjectCategoryId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            //echo $selected . "<br>";
                                            echo "<option value='" . $expertparent->ProjectCategoryId . "' " . $selected . ">" . $expertparent->ProjectCategoryId . " : " . $expertparent->Title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Title">
                                    عنوان مهارت :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Title" placeholder="عنوان مهارت را وارد کنید" name="Title" value="<?php echo $cm == 'edit' ? $expert->Title : '' ?>" />
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
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertProjectCategory" />
                                    <a class="btn btn-light-orange" href="ProjectCategories.php" >
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