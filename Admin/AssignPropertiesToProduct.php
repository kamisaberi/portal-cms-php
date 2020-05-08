<?php require_once 'Template/top.php'; ?>

<?php
require_once '../Classes/ProductProperty.inc';
require_once '../Classes/ProductCategory.inc';
require_once '../Classes/Product.inc';
?>
<?php
$cm='edit';
if (isset($_GET['productid']) && is_numeric($_GET['productid'])) {
    $product = ProductController::FindOneProduct($_GET['productid'], TRUE, FALSE);
}
?>

<main class="container-fluid fixed-nav-offset">
    <div class="row">
        <form action="UpdateAssignedPropertiesToProduct.php" method="POST" class="form-horizontal">
            <input type="hidden" id="cm" name="cm" value="<?php echo $cm ?>" />
            <?php echo $cm == 'edit' ? "<input type='hidden' id='ProductId' name='ProductId' value='$product->ProductId' />" : ''; ?>
            <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-plus"></span> &nbsp;
                        تخصیص خاصیت ها
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">

                            <?php
                            $properties = ProductPropertyController::GetSelectedPropertiesForCategory($product->ProductCategory->ProductCategoryId);
                            foreach ($properties as $property) {
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="Title">
                                        <?php echo "<input type='hidden' name='properties[]' id='properties[]' value='{$property->ProductPropertyId}' />"; ?>
                                        <?php echo $property->Title . ":" ?>
                                    </label>
                                    <div class="col-sm-9">
                                        <?php
                                        if (trim($property->Values) == '') {
                                            echo "<input type='text' class = 'form-control'  id='values[]' name='values[]' value='' />";
                                        } else {

                                            $s = $property->Values;
                                            $sars = explode('-', $s);
                                            echo "<select class = 'form-control'  id='values[]' name='values[]' >";
                                            echo "<option value=''>  </option>";
                                            foreach ($sars as $sar) {
                                                $sar = trim($sar);
                                                $selected = "";
                                                echo "<option value='$sar' $selected> $sar </option>";
                                            }
                                            echo '</select>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>






                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="ذخیره" name="InsertExam" />  
                                    <a class="btn btn-light-orange" href="Exams.php?lessonid=<?php echo $_GET['lessonid'] ?>">
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
