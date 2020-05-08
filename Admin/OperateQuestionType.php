<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/QuestionType.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new QuestionType();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        QuestionTypeController::Insert($pst);
        redirectTo("QuestionTypes.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new QuestionType();
        $pst->QuestionTypeId = $_POST['QuestionTypeId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        QuestionTypeController::Update($pst);
        redirectTo("QuestionTypes.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new QuestionType();
        $pst->QuestionTypeId = $_GET['id'];
        QuestionTypeController::Delete($pst);
        redirectTo("QuestionTypes.php");
    }
}


