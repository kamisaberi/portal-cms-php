<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>
<?php
require_once '../Classes/Question.inc';
require_once '../Classes/Functions.inc';
?>
<?php
if (isset($_GET['lessonid']) == FALSE || is_numeric($_GET['lessonid']) == FALSE) {
    redirectTo("Lessons.php"); // TODO with Problem
}





$post = new Question();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post = QuestionController::FindOneQuestion($_GET['id']);
    $cm = 'edit';
}
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form action="OperateQuestion.php" method="POST" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='QuestionId' name='QuestionId' value='$post->QuestionId' />" : ''; ?>
            <input type="hidden" id="LessonId" name="LessonId" value="<?php echo $_GET['lessonid'] ?>" />
            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف سمت جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Content">
                                    عنوان سوال :
                                </label>
                                <div class="col-sm-9">
                                    <input type="Content"  name="Content" class="form-control" id="Title" placeholder="عنوان سمت را وارد کنید" value="<?php echo $cm == 'edit' ? $post->Content : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="QuestionType">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <select name="QuestionType" id="QuestionType" class="form-control" >
                                        <?php
                                        $expertparents = QuestionTypeController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($post->QuestionType->QuestionTypeId == $expertparent->QuestionTypeId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            echo "<option value='" . $expertparent->QuestionTypeId . "' " . $selected . ">" . $expertparent->QuestionTypeId . " : " . $expertparent->Title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="control-label col-sm-3" for="ExamQuestionLevel">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <select name="ExamQuestionLevel" id="ExamQuestionLevel" class="form-control" >
                                        <?php
                                        $expertparents = ExamQuestionLevelController::Fill();
                                        foreach ($expertparents as $expertparent) {
                                            $selected = "";
                                            if ($cm == 'edit') {
                                                if ($post->ExamQuestionLevel->ExamQuestionLevelId == $expertparent->ExamQuestionLevelId) {
                                                    $selected = "selected";
                                                }
                                            }
                                            echo "<option value='" . $expertparent->ExamQuestionLevelId . "' " . $selected . ">" . $expertparent->ExamQuestionLevelId . " : " . $expertparent->Title . "</option>";
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
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertQuestion" />  
                                    <a class="btn btn-light-orange" href="Questions.php?lessonid=<?php echo $_GET['lessonid'] ?>">
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