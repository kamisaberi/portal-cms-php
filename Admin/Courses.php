<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?><?php
require_once '../Classes/Course.inc';
?>
<?php
$posts = CourseController::Fill($_GET['expertid']);
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
                                    <th>مشاهده اطلاعات دروس</th>
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
                                        <td><?php echo $post->Description; ?></td>
                                        <td><a href="Course.php?expertid=<?php echo $_GET['expertid'] . '&' ?>id=<?php echo $post->CourseId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateCourse.php?expertid=<?php echo $_GET['expertid'] . '&' ?>id=<?php echo $post->CourseId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</td>
                                        <td><a href ="Lessons.php?courseid=<?php echo $post->CourseId ?>" class="text-warning"><span class="glyphicon glyphicon-list-alt"></span>مشاهده اطلاعات دروس</a></td>

                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="Course.php?expertid=<?php echo $_GET['expertid'] ?>"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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