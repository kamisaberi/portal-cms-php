<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';            ?>

<?php
require_once '../Classes/Member.inc';
require_once '../Classes/Expert.inc';
require_once '../Classes/MemberExpert.inc';
require_once '../Classes/MemberProject.inc';
?>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $member = new Member();
    $member->MemberId = $_GET['id'];
    $exprt = new Expert();
    $experts = $exprt->FindExpertsForMember($_GET['id']);
    $mmbrproj = new MemberProject();
    $memberProjects = $mmbrproj->FindProjectsForMember($_GET['id']);
    if ($foundedMember = $member->FindOneMember()) {
        $_SESSION['MemberInformation'] = $foundedMember->FirstName . " " . $foundedMember->LastName;
    } else {
//        echo "NOOOOOOO";
    }
}
?>
<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirectTo("Members.php");
}
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">

    <!--Firt Row-->
    <div class="row">
        <div class="col-sm-9 small-padding">
            <div class="box-container">
                <div class="box-heading">
                    <h5><span class="glyphicon glyphicon-user"></span> مشخصات فردی </h5>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-7">نام و نام خانوادگی :</label>
                                    <label class="control-label col-sm-5"><?php echo $foundedMember->FirstName . " " . $foundedMember->LastName; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>

                    <div class="hr-line"></div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-7">جنسیت :</label>
                                    <label class="control-label col-sm-5"><?php echo $foundedMember->Sex ?> </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-7">تاریخ تولد :</label>
                                    <label class="control-label col-sm-5 yekan"><?php echo $foundedMember->BirthDate ?></label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-7">شماره تلفن همراه :</label>
                                    <label class="control-label col-sm-5 yekan"><?php echo $foundedMember->Mobile ?></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-7">شماره ملی :</label>
                                    <label class="control-label col-sm-5 yekan"><?php echo $foundedMember->MelliCode ?></label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="hr-line"></div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-7">آدرس :</label>
                                    <label class="control-label col-sm-5"> <?php echo $foundedMember->Address; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-sm-3 small-padding">
            <div class="box-container">

                <div class="thumbnails-container">
                    <span class="helper"></span>
                    <img src="images/<?php echo $foundedMember->ImagePath; ?>" alt="" />
                </div>

            </div>
        </div>

    </div>


    <!--Second Row-->
    <div class="row">
        <div class=" col-sm-12">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="	glyphicon glyphicon-inbox"></span> &nbsp;
                    مهارت ها
                </div>
                <div class="panel-body no-padding">


                    <div class="table-responsive">
                        <table class="table table-hover table-striped no-margin">
                            <thead>
                                <tr class="fav">
                                    <th>ردیف</th>
                                    <th>عنوان مهارت</th>
                                    <th>توضیحات</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                foreach ($experts as $key => $expert):
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $expert->Title; ?></td>
                                        <td><?php echo $expert->Description ?></td>
                                        <td>
                                            <a href="DeleteMemberExpert.php?&id=<?php echo $expert->MemberExpertId; ?>&Member=<?php echo $member->MemberId ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="InsertMemberExpert.php?id=<?php echo $foundedMember->MemberId; ?>">
                                    <span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
                                    افزودن مهارت
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--Third Row-->
    <div class="row">
        <div class=" col-sm-12">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="	glyphicon glyphicon-inbox"></span> &nbsp;
                    پروژه هایی که در آنها مشارکت داشته
                </div>
                <div class="panel-body no-padding">


                    <div class="table-responsive">
                        <table class="table table-hover table-striped no-margin">
                            <thead>
                                <tr class="fav">
                                    <th>ردیف</th>
                                    <th>عنوان پروژه</th>
                                    <th>سمت در پروژه</th>
                                    <th>توضیحات</th>
                                    <th>وضعیت پروژه</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($memberProjects as $key => $memberProject) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $memberProject->ProjectName; ?></td>
                                        <td><?php echo $memberProject->Post; ?></td>
                                        <td><?php echo $memberProject->Description; ?></td>
                                        <td>
                                            <a href="#" class="text-warning">
                                                <span class="glyphicon glyphicon-stats"></span>&nbsp;
                                                وضعیت پروژه
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a>
                                        </td>
                                        <td>
                                            <a href="DeleteMemberProject.php?&id=<?php echo $memberProject->MemberProjectId; ?>&Member=<?php echo $memberProject->Member; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a>
                                        </td>

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
                                <a class="btn btn-dark-orange" href="InsertMemberProject.php?id=<?php echo $foundedMember->MemberId; ?>">
                                    <span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
                                    انتخاب پروژه جدید
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