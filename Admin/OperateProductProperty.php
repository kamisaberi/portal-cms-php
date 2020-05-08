<?php require_once '../Classes/Functions.inc'; ?>
<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';            ?>
<?php require_once '../Classes/ProductProperty.inc'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $expert = new ProductProperty();
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Values =$_POST['Values'];
        ProductPropertyController::Insert($expert);
        redirectTo("ProductProperties.php");
    } elseif ($_POST['cm'] == 'edit') {
        $expert = new ProductProperty();
        $expert->ProductPropertyId = $_POST['ProductPropertyId'];
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Values =$_POST['Values'];
        ProductPropertyController::Update($expert);
        redirectTo("ProductProperties.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $expert = new ProductProperty();
        $expert->ProductPropertyId = $_GET['id'];
        ProductPropertyController::Delete($expert);
        redirectTo("ProductProperties.php");
    }
}

