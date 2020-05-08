<?php
include_once 'Template/Header.php';
?>
<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>
<?php
require_once '../Classes/Project.inc';
require_once '../Classes/Functions.inc';
?>
<?php
$project = new Project();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $project = ProjectController::FindOneProject($_GET['id']);
    $cm = 'edit';
}
?>
<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form class="form-horizontal" action="OperateProject.php" method="POST">

            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ProjectId' name='ProjectId' value='$project->ProjectId' />" : ''; ?>


            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف پروژه جدید
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
                                        $expertparents = ProjectController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($project->Parent == $expertparent->ProjectId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            echo "<option value='" . $expertparent->ProjectId . "' " . $selected . ">" . $expertparent->ProjectId . " : " . $expertparent->ProjectName . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="ProjectName">
                                    عنوان پروژه :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ProjectName" name="ProjectName" placeholder="عنوان پروژه را وارد کنید" value="<?php echo $cm == 'edit' ? $project->ProjectName : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Description">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="Description" id="Description" placeholder="توضیحات را وارد کنید"><?php echo $cm == 'edit' ? $project->Description : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" value="ذخیره" name="InsertProject" class="btn btn-dark-orange"  />
                                    <a class="btn btn-light-orange" href="Projects.php">
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