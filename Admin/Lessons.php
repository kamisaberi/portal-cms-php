<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?><?php
require_once '../Classes/Lesson.inc';
?>
<?php
$posts = LessonController::Fill($_GET['courseid']);
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
                                    <th>عنوان سمت</th>
                                    <th>توضیحات</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                    <th> فهرست سوالات</th>
                                    <th> فهرست آزمون ها</th>
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
                                        <td><?php echo $post->Content; ?></td>
                                        <td><a href="Lesson.php?courseid=<?php echo $_GET['courseid'] . '&' ?>id=<?php echo $post->LessonId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateLesson.php?courseid=<?php echo $_GET['courseid'] . '&' ?>id=<?php echo $post->LessonId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</td>


                                        <td><a href ="Questions.php?lessonid=<?php echo $post->LessonId ?>" class="text-warning"><span class="glyphicon glyphicon-list-alt"></span>فهرست سوالات</a></td>


                                        <td><a href ="Exams.php?lessonid=<?php echo $post->LessonId ?>" class="text-warning"><span class="glyphicon glyphicon-list-alt"></span>فهرست آزمون ها</a></td>



                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="Lesson.php?courseid=<?php echo $_GET['courseid'] ?>"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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