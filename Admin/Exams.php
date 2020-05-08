<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?><?php
require_once '../Classes/Exam.inc';
?>
<?php
$posts = ExamController::GetExamsForLesson($_GET['lessonid']);
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
                                    <th>عنوان </th>
                                    <th>نوع آزمون</th>
                                    <th>سطح آزمون</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                    <th>اختصاص سوالات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($posts as $key => $post) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $post->Title; ?></td>
                                        <td><?php echo $post->ExamType->Title; ?></td>
                                        <td><?php echo $post->ExamQuestionLevel->Title; ?></td>
                                        <td><a href="Exam.php?lessonid=<?php echo $_GET['lessonid'] . '&' ?>id=<?php echo $post->ExamId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateExam.php?lessonid=<?php echo $_GET['lessonid'] . '&' ?>id=<?php echo $post->ExamId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</td>

                                        <td><a href ="AssignQuestionsToExam.php?lessonid=<?php echo $_GET['lessonid'] . '&' ?>id=<?php echo $post->ExamId; ?>" class="text-warning"><span class="glyphicon glyphicon-list-alt"></span>  اختصاص سوالات</a></td>

                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="Exam.php?lessonid=<?php echo $_GET['lessonid'] ?>"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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