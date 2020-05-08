<?php require_once 'Template/top.php'; ?>

<?php
require_once '../Classes/ProductProperty.inc';
require_once '../Classes/ProductCategory.inc';
?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $category = ProductCategoryController::FindOneProductCategory($_GET['id'], TRUE);
    //echo $_GET['id'] ."<br>";
    //echo $category->ProductCategoryId ."<br>";
}
?>

<form method="post" id="form1" name="form1" action="UpdateAssignedPropertiesToCategory.php" >
    <input type="hidden" name="ProductCategoryId" id="ProductCategoryId" value="<?php echo $_GET['id'] ?>"/>
    <main class="container-fluid fixed-nav-offset">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                <div class="panel panel-fav">
                    <div class="panel-heading">
                        <span class="	glyphicon glyphicon-inbox"></span> &nbsp;
                        مشاهده لیست خاصیت ها
                    </div>
                    <div class="panel-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped no-margin">
                                <thead>
                                    <tr class="fav">
                                        <th>ردیف</th>
                                        <th>انتخاب</th>
                                        <th>عنوان</th>
                                        <th>توضیحات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    $properties = ProductPropertyController::Fill();
                                    foreach ($properties as $property) {
                                        ?>
                                        <tr>
                                            <td><?php echo $counter++; ?></td>
                                            <td>
                                                <?php
                                               // echo $property->ProductPropertyId ;
                                                echo "<input type='checkbox' name='properties[]' id='properties[]' value=" . $property->ProductPropertyId . " " . ($category->IsPropertySelected($property->ProductPropertyId) == TRUE ? 'checked ' : '') . "/>";
                                                ?>
                                            </td>
                                            <td><?php echo $property->Title; ?></td>
                                            <td><?php echo $property->Description; ?></td>
                                        </tr>
                                    <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <div class="form-horizontal">
                            <div class="form-group no-margin">
                                <div class="col-sm-offset-3 col-sm-9 left-align">
                                    <input type="submit" class="btn btn-dark-orange" value="اختصاص" name="InsertExam" />  
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
        </div>
    </main>
</form> 

<?php require_once 'Template/buttom.php'; ?>
