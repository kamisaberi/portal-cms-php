<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';    ?>

<?php
require_once '../Classes/ProductPrice.inc';
require_once '../Classes/Functions.inc';
?>
<?php
if (isset($_GET['productid']) == FALSE || is_numeric($_GET['productid']) == FALSE) {
    redirectTo("Products.php");
}


$post = new ProductPrice();
$cm = 'add';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post = ProductPriceController::FindOneProductPrice($_GET['id']);
    $cm = 'edit';
}
?>

<!--Main Container-->
<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form action="OperateProductPrice.php" method="POST" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ProductPriceId' name='ProductPriceId' value='$post->ProductPriceId' />" : ''; ?>
            <input type="hidden" id="ProductId" name="ProductId" value="<?php echo $_GET['productid'] ?>" />
            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تعریف قیمت جدید
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Value">
                                    عنوان سمت :
                                </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="Value" class="form-control" id="Value" placeholder="عنوان سمت را وارد کنید" value="<?php echo $cm == 'edit' ? $post->Value : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="Description">
                                    توضیحات :
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="Description" name="Description" placeholder="توضیحات را وارد کنید"><?php echo $cm == 'edit' ? $post->Description : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertProductPrice" />  
                                    <a class="btn btn-light-orange" href="ProductPrices.php">
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