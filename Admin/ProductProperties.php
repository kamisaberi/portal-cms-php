<?php
include_once 'Template/Header.php';
?>



<?php

include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>

<?php require_once '../Classes/Functions.inc'; ?>

<?php //require_once 'Template/NavBar.php';  ?>
<?php
require_once '../Classes/ProductProperty.inc';
?>
<?php
$experts = ProductPropertyController::Fill();
?>
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-fav">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-inbox"></span> &nbsp;
                    مشاهده لیست مهارت ها
                </div>
                <div class="panel-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped no-margin">
                            <thead>
                                <tr class="fav">
                                    <th>ردیف</th>
                                    <th>عنوان </th>
                                    <th>مقادیر</th>
                                    <th>توضیحات</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($experts as $key => $expert) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $expert->Title; ?></td>
                                        <td><?php echo $expert->Values; ?></td>
                                        <td><?php echo $expert->Description; ?></td>
                                        <td><a href="ProductProperty.php?id=<?php echo $expert->ProductPropertyId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateProductProperty.php?id=<?php echo $expert->ProductPropertyId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</a></td>

                                        
                                        
                                        
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
                                <a class="btn btn-dark-orange" href="ProductProperty.php"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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