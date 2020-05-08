<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php'; ?>

<?php
require_once '../Classes/ProductMediaType.inc';
?>
<?php
$psts = ProductMediaTypeController::Fill();
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-inbox"></span> &nbsp;
                    مشاهده لیست وضعیت ها
                </div>
                <div class="panel-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped no-margin">
                            <thead>
                                <tr class="fav">
                                    <th>ردیف</th>
                                    <th>عنوان وضعیت</th>
                                    <th>توضیحات</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($psts as $key => $pst) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $pst->Title; ?></td>
                                        <td><?php echo $pst->Description; ?></td>
                                        <td><a href="ProductMediaType.php?id=<?php echo $pst->ProductMediaTypeId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateProductMediaType.php?id=<?php echo $pst->ProductMediaTypeId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a></td>
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
                                <a class="btn btn-dark-orange" href="ProductMediaType.php"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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