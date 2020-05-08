<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';       ?>
<?php
require_once '../Classes/ProductPrice.inc';
?>
<?php
$posts = ProductPriceController::Fill($_GET['productid']);
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
                                    <th>قیمت</th>
                                    <th>توضیحات</th>
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
                                        <td><?php echo $post->Value; ?></td>
                                        <td><?php echo $post->Description; ?></td>
                                        <td><a href="ProductPrice.php?productid=<?php echo $_GET['productid'] . '&' ?>id=<?php echo $post->ProductPriceId; ?>" class="text-info"><span class="glyphicon glyphicon-edit"></span> ویرایش</a></td>
                                        <td><a href="OperateProductPrice.php?productid=<?php echo $_GET['productid'] . '&' ?>id=<?php echo $post->ProductPriceId; ?>" class="text-danger"><span class="glyphicon glyphicon-remove"></span> حذف</td>
                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer ">
                    <div class="form-horizontal">
                        <div class="form-group no-margin">
                            <div class=" col-sm-9 ">
                                <a class="btn btn-dark-orange" href="ProductPrice.php?productid=<?php echo $_GET['productid'] ?>"><span class="glyphicon glyphicon glyphicon-plus"></span>&nbsp;
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