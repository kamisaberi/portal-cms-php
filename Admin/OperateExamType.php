<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/ExamType.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new ExamType();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ExamTypeController::Insert($pst);
        redirectTo("ExamTypes.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new ExamType();
        $pst->ExamTypeId = $_POST['ExamTypeId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ExamTypeController::Update($pst);
        redirectTo("ExamTypes.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new ExamType();
        $pst->ExamTypeId = $_GET['id'];
        ExamTypeController::Delete($pst);
        redirectTo("ExamTypes.php");
    }
}


