<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';   ?>

<?php
require_once '../Classes/Member.inc';
?>
<?php
$members = MemberController::Fill();
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">

    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-inbox"></span> &nbsp;
                    مشاهده لیست کاربران ها
                </div>
                <div class="panel-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped no-margin">
                            <thead>
                                <tr class="fav">
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>جنسیت</th>
                                    <th>تاریخ تولد</th>
                                    <th>کد ملی</th>
                                    <th>شماره تلفن همراه</th>
                                    <th>آدرس</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                    <th>مشاهده اطلاعات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($members as $key => $member) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $member->FirstName; ?></td>
                                        <td><?php echo $member->LastName; ?></td>
                                        <td><?php echo $member->Sex; ?></td>
                                        <td><?php echo $member->BirthDate; ?></td>
                                        <td><?php echo $member->MelliCode; ?></td>
                                        <td><?php echo $member->Mobile; ?></td>
                                        <td><?php echo $member->Address; ?></td>
                                        <td><a href = "Member.php?id=<?php echo $member->MemberId ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href = "OperateMember.php?id=<?php echo $member->MemberId ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a></td>
                                        <td><a href = "MemberDashboard.php?id=<?php echo $member->MemberId ?>" class="text-warning"><span class="glyphicon glyphicon-list-alt"></span> مشاهده اطلاعات</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="Member.php">
                                    <span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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
<?php require_once 'Template/buttom.php'; ?>