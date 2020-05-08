<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?><?php
require_once '../Classes/Question.inc';
?>
<?php
$posts = QuestionController::GetQuestonsForLesson($_GET['lessonid']);
?>
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="	glyphicon glyphicon-inbox"></span> &nbsp;
                    مشاهده لیست سمت ها
                </div>
                <div class="panel-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped no-margin">
                            <thead>
                                <tr class="fav">
                                    <th>ردیف</th>
                                    <th>متن سوال</th>
                                    <th>نوع</th>
                                    <th>سطح سوال</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($posts as $key => $post) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $post->Content; ?></td>
                                        <td><?php echo $post->QuestionType->Title; ?></td>
                                        <td><?php echo $post->ExamQuestionLevel->Title; ?></td>
                                        <td><a href="Question.php?lessonid=<?php echo $_GET['lessonid'] . '&' ?>id=<?php echo $post->QuestionId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateQuestion.php?lessonid=<?php echo $_GET['lessonid'] . '&' ?>id=<?php echo $post->QuestionId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</td>
                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="Question.php?lessonid=<?php echo $_GET['lessonid'] ?>"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
                                    افزودن
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include_once 'Template/LeftSideBar.php';
include_once 'Template/Footer.php';
?>