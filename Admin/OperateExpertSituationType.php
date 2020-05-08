<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/ExpertSituationType.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new ExpertSituationType();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ExpertSituationTypeController::Insert($pst);
        redirectTo("ExpertSituationTypes.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new ExpertSituationType();
        $pst->ExpertSituationTypeId = $_POST['ExpertSituationTypeId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ExpertSituationTypeController::Update($pst);
        redirectTo("ExpertSituationTypes.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new ExpertSituationType();
        $pst->ExpertSituationTypeId = $_GET['id'];
        ExpertSituationTypeController::Delete($pst);
        redirectTo("ExpertSituationTypes.php");
    }
}


