<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/ProductPrice.inc'; ?>
<?php

require_once '../Classes/ProductPrice.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new ProductPrice();
        $post->Value = $_POST['Value'];
        $post->Description = $_POST['Description'];

        ProductPriceController::Insert($post, $_POST['ProductId']);
        redirectTo("ProductPrices.php?productid={$_POST['ProductId']}");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new ProductPrice();
        $post->ProductPriceId = $_POST['ProductPriceId'];
        $post->Value = $_POST['Value'];
        $post->Description = $_POST['Description'];
        ProductPriceController::Update($post, $_POST['ProductId']);
        redirectTo("ProductPrices.php?productid={$_POST['ProductId']}");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new ProductPrice();
        $post->ProductPriceId = $_GET['id'];
        ProductPriceController::Delete($post);
        
        redirectTo("ProductPrices.php?productid={$_GET['productid']}");
    }
}


