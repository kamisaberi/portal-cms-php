<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/ProductLevel.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new ProductLevel();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ProductLevelController::Insert($pst);
        redirectTo("ProductLevels.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new ProductLevel();
        $pst->ProductLevelId = $_POST['ProductLevelId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ProductLevelController::Update($pst);
        redirectTo("ProductLevels.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new ProductLevel();
        $pst->ProductLevelId = $_GET['id'];
        ProductLevelController::Delete($pst);
        redirectTo("ProductLevels.php");
    }
}


