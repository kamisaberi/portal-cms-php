<?php require_once '../Classes/Functions.inc'; ?>
<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?><?php require_once '../Classes/Expert.inc'; ?>
<?php
$expert = new Expert();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $expert = ExpertController::FindOneExpert($_GET['id']);
    $cm = 'edit';
    //echo $expert->Parent . "<br>";
}
?>






<main class="container-fluid fixed-nav-offset">

    <div class="row">
        <form action="OperateExpert.php" method="POST" role="form" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ExpertId' name='ExpertId' value='$expert->ExpertId' />" : ''; ?>
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
                                        
                                        
                                        $expertparents = ExpertController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($expert->Parent == $expertparent->ExpertId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            //echo $selected . "<br>";
                                            echo "<option value='" . $expertparent->ExpertId . "' " . $selected . ">" . $expertparent->ExpertId . " : " . $expertparent->Title . "</option>";
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
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertExpert" />
                                    <a class="btn btn-light-orange" href="Experts.php" >
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