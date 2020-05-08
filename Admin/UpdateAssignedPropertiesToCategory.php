
<?php

session_start();
require_once '../Classes/Exam.inc';
require_once '../Classes/ProductCategory.inc';
require_once '../Classes/ProductProperty.inc';
require_once '../Classes/Functions.inc';

if (isset($_POST['ProductCategoryId'])) {
    $properties = array();
    if (isset($_POST['properties'])) {
        $properties= $_POST['properties'];
    }
    //echo $_POST['ProductCategoryId'] . "<br>";
    $category = $_POST['ProductCategoryId'];
    ProductPropertyController::AssignPropertiesToCategory($category, $properties);
    redirectTo("ProductCategories.php");
}


