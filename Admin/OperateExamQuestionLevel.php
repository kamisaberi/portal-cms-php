<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/ExamQuestionLevel.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new ExamQuestionLevel();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ExamQuestionLevelController::Insert($pst);
        redirectTo("ExamQuestionLevels.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new ExamQuestionLevel();
        $pst->ExamQuestionLevelId = $_POST['ExamQuestionLevelId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ExamQuestionLevelController::Update($pst);
        redirectTo("ExamQuestionLevels.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new ExamQuestionLevel();
        $pst->ExamQuestionLevelId = $_GET['id'];
        ExamQuestionLevelController::Delete($pst);
        redirectTo("ExamQuestionLevels.php");
    }
}


