
<?php

session_start();
require_once '../Classes/Exam.inc';
require_once '../Classes/ProductCategory.inc';
require_once '../Classes/ProductProperty.inc';
require_once '../Classes/Functions.inc';

    echo 'dasdsadsadadasdsad';
if (isset($_POST['ProductId'])) {
    $properties = array();
    $values = array();
    if (isset($_POST['properties'])) {
        $properties = $_POST['properties'];
        $values = $_POST['values'];
    }

    $productid = $_POST['ProductId'];
    echo $productid;
    ProductPropertyController::AssignPropertiesToProduct($productid, $properties , $values);
    redirectTo("Products.php");
}


