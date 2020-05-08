<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/MemberType.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new MemberType();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        MemberTypeController::Insert($pst);
        redirectTo("MemberTypes.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new MemberType();
        $pst->MemberTypeId = $_POST['MemberTypeId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        MemberTypeController::Update($pst);
        redirectTo("MemberTypes.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new MemberType();
        $pst->MemberTypeId = $_GET['id'];
        MemberTypeController::Delete($pst);
        redirectTo("MemberTypes.php");
    }
}


