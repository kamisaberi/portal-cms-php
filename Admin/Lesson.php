<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>
<?php
require_once '../Classes/Lesson.inc';
require_once '../Classes/Functions.inc';
?>
<?php

if (isset($_GET['courseid']) == FALSE || is_numeric($_GET['courseid']) == FALSE) {
    redirectTo("Courses.php"); // TODO with Problem
}


$post = new Lesson();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post = LessonController::FindOneLesson($_GET['id']);
    $cm = 'edit';
}
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form action="OperateLesson.php" method="POST" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='LessonId' name='LessonId' value='$post->LessonId' />" : ''; ?>
            <input type="hidden" id="CourseId" name="CourseId" value="<?php echo $_GET['courseid'] ?>" />

            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف سمت جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Title">
                                    عنوان سمت :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="Title" class="form-control" id="Title" placeholder="عنوان سمت را وارد کنید" value="<?php echo $cm == 'edit' ? $post->Title : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Content">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="Content" name="Content" placeholder="توضیحات را وارد کنید"><?php echo $cm == 'edit' ? $post->Content : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertLesson" />  
                                    <a class="btn btn-light-orange" href="Lessons.php">
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