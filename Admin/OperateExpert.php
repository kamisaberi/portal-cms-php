<?php require_once '../Classes/Functions.inc'; ?>
<?php require_once 'Template/top.php'; ?>
<?php //require_once 'Template/NavBar.php';            ?>
<?php require_once '../Classes/Expert.inc'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $expert = new Expert();
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Parent =$_POST['Parent'];
        ExpertController::Insert($expert);
        redirectTo("Experts.php");
    } elseif ($_POST['cm'] == 'edit') {
        $expert = new Expert();
        $expert->ExpertId = $_POST['ExpertId'];
        $expert->Title = $_POST['Title'];
        $expert->Description = $_POST['Description'];
        $expert->Parent =$_POST['Parent'];
        ExpertController::Update($expert);
        redirectTo("Experts.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $expert = new Expert();
        $expert->ExpertId = $_GET['id'];
        ExpertController::Delete($expert);
        redirectTo("Experts.php");
    }
}

