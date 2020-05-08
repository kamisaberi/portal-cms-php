<?php require_once 'Template/top.php'; ?>

<?php
require_once '../Classes/Exam.inc';
require_once '../Classes/Question.inc';
?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $exam = ExamController::FindOneExam($_GET['id'], TRUE);
}
?>

<form method="post" id="form1" name="form1" action="UpdateAssignedQuestionsToExam.php" >
    <input type="hidden" name="ExamId" id="ExamId" value="<?php echo $_GET['id'] ?>"/>
    <input type="hidden" id="LessonId" name="LessonId" value="<?php echo $_GET['lessonid'] ?>" />
    <main class="container-fluid fixed-nav-offset">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                <div class="panel panel-fav">



                    <div class="panel-heading">
                        <span class="	glyphicon glyphicon-inbox"></span> &nbsp;
                        مشاهده لیست سوالات
                    </div>
                    <div class="panel-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped no-margin">
                                <thead>
                                    <tr class="fav">
                                        <th>ردیف</th>
                                        <th>انتخاب</th>
                                        <th>متن سوال</th>
                                        <th>نوع سوال</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    $questions = QuestionController::GetQuestonsForLesson($_GET['lessonid']);
                                    foreach ($questions as $question) {
                                        ?>
                                        <tr>
                                            <td><?php echo $counter++; ?></td>
                                            <td>
                                                <?php
                                                echo "<input type='checkbox' name='questions[]' id='questions[]' value=" . $question->QuestionId . " " . ($exam->IsQuestionSelected($question->QuestionId) == TRUE ? 'checked ' : '') . "/>";
                                                ?>
                                            </td>
                                            <td><?php echo $question->Content; ?></td>
                                            <td><?php echo $question->QuestionType->Title; ?></td>
                                        </tr>
                                    <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="اختصاص" name="InsertExam" />  
                                    <a class="btn btn-light-orange" href="Exams.php?lessonid=<?php echo $_GET['lessonid'] ?>">
                                        <span class="glyphicon glyphicon glyphicon-remove-sign"></span>
                                        انصراف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</form> 

<?php require_once 'Template/buttom.php'; ?>
