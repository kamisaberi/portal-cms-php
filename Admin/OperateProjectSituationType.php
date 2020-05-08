<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/ProjectSituationType.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new ProjectSituationType();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ProjectSituationTypeController::Insert($pst);
        redirectTo("ProjectSituationTypes.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new ProjectSituationType();
        $pst->ProjectSituationTypeId = $_POST['ProjectSituationTypeId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ProjectSituationTypeController::Update($pst);
        redirectTo("ProjectSituationTypes.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new ProjectSituationType();
        $pst->ProjectSituationTypeId = $_GET['id'];
        ProjectSituationTypeController::Delete($pst);
        redirectTo("ProjectSituationTypes.php");
    }
}


