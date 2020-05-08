<?php require_once 'Template/top2.php'; ?>
<?php

require_once '../Classes/ProductMediaType.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $pst = new ProductMediaType();
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ProductMediaTypeController::Insert($pst);
        redirectTo("ProductMediaTypes.php");
    } elseif ($_POST['cm'] == 'edit') {
        $pst = new ProductMediaType();
        $pst->ProductMediaTypeId = $_POST['ProductMediaTypeId'];
        $pst->Title = $_POST['Title'];
        $pst->Description = $_POST['Description'];
        ProductMediaTypeController::Update($pst);
        redirectTo("ProductMediaTypes.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pst = new ProductMediaType();
        $pst->ProductMediaTypeId = $_GET['id'];
        ProductMediaTypeController::Delete($pst);
        redirectTo("ProductMediaTypes.php");
    }
}


