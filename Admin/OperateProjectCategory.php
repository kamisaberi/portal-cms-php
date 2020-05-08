<?php require_once '../Classes/Functions.inc'; ?>
<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';            ?>
<?php require_once '../Classes/ProjectCategory.inc'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $expert = new ProjectCategory();
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Parent =$_POST['Parent'];
        ProjectCategoryController::Insert($expert);
        redirectTo("ProductCategories.php");
    } elseif ($_POST['cm'] == 'edit') {
        $expert = new ProjectCategory();
        $expert->ProjectCategoryId = $_POST['ProjectCategoryId'];
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Parent =$_POST['Parent'];
        ProjectCategoryController::Update($expert);
        redirectTo("ProductCategories.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $expert = new ProjectCategory();
        $expert->ProjectCategoryId = $_GET['id'];
        ProjectCategoryController::Delete($expert);
        redirectTo("ProductCategories.php");
    }
}

