<?php require_once '../Classes/Functions.inc'; ?>
<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';            ?>
<?php require_once '../Classes/ProductCategory.inc'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $expert = new ProductCategory();
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Parent =$_POST['Parent'];
        ProductCategoryController::Insert($expert);
        redirectTo("ProductCategories.php");
    } elseif ($_POST['cm'] == 'edit') {
        $expert = new ProductCategory();
        $expert->ProductCategoryId = $_POST['ProductCategoryId'];
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Parent =$_POST['Parent'];
        ProductCategoryController::Update($expert);
        redirectTo("ProductCategories.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $expert = new ProductCategory();
        $expert->ProductCategoryId = $_GET['id'];
        ProductCategoryController::Delete($expert);
        redirectTo("ProductCategories.php");
    }
}

