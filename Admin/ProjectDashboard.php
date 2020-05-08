<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';     ?>

<?php
require_once '../Classes/Project.inc';
require_once '../Classes/Expert.inc';
require_once '../Classes/ProjectExpert.inc';
?>

<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $project = new Project();
    $project->ProjectId = $_GET['id'];
    $exprt = new Expert();
    $experts = $exprt->FindExpertsForProject($_GET['id']);
    if ($foundedProject = $project->FindOneProject()) {
        $_SESSION['ProjectInformation'] = $foundedProject->ProjectName;
    } else {
//        echo "NOOOOOOO";
    }
}
?>
<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirectTo("Projects.php");
}
?>

<hr>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp;
                    مشخصات پروژه
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="projectName">
                                    نام پروژه :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo $foundedProject->ProjectName; ?>" disabled class="form-control" id="projectName" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="description">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" disabled id="description"><?php echo $foundedProject->Description ?></textarea>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-inbox"></span> &nbsp;
                    لیست مهارت های مورد نیاز
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
                                $counter = 1;
                                foreach ($experts as $key => $expert):
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $expert->Title ?></td>
                                        <td><?php echo $expert->Description ?></td>
                                        <td><a href="DeleteProjectExpert.php?&id=<?php echo $expert->ProjectExpertId; ?>&Project=<?php echo $project->ProjectId ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a></td>
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
                                <a class="btn btn-dark-orange" href="InsertProjectExpert.php?id=<?php echo $foundedProject->ProjectId; ?>"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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