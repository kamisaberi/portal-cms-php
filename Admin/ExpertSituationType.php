<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';   ?>

<?php
require_once '../Classes/ExpertSituationType.inc';
require_once '../Classes/Functions.inc';
?>
<?php
$pst = new ExpertSituationType();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pst = ExpertSituationTypeController::FindOneExpertSituationType($_GET['id']);
    $cm = 'edit';
}
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form class="form-horizontal" action="OperateExpertSituationType.php" method="POST">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ExpertSituationTypeId' name='ExpertSituationTypeId' value='$pst->ExpertSituationTypeId' />" : ''; ?>

            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف وضعیت جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Title">
                                    عنوان وضعیت :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="Title" class="form-control" id="Title" placeholder="عنوان وضعیت را وارد کنید" value="<?php echo $cm == 'edit' ? $pst->Title : '' ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Description">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"  name="Description"  id="Description" placeholder="توضیحات را وارد کنید"><?php echo $cm == 'edit' ? $pst->Description : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" value="ذخیره" name="InsertProjectSituationType" class="btn btn-dark-orange" />   
                                    <a class="btn btn-light-orange" href="ExpertSituationTypes.php">
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

<?php require_once 'Template/buttom.php'; ?>