<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/Product.inc'; ?>
<?php

require_once '../Classes/Product.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new Product();
        $post->Title = $_POST['Title'];
        $post->Description = $_POST['Description'];
        $post->ProductCategory->ProductCategoryId = $_POST['ProductCategory'];
        $post->ProductLevel->ProductLevelId = $_POST['ProductLevel'];
        $post->ProductMediaType->ProductMediaTypeId = $_POST['ProductMediaType'];
        ProductController::Insert($post);
        redirectTo("Products.php");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new Product();
        $post->ProductId = $_POST['ProductId'];
        $post->Title = $_POST['Title'];
        $post->Description = $_POST['Description'];
        $post->ProductCategory->ProductCategoryId = $_POST['ProductCategory'];
        $post->ProductLevel->ProductLevelId = $_POST['ProductLevel'];
        $post->ProductMediaType->ProductMediaTypeId = $_POST['ProductMediaType'];
        ProductController::Update($post);
        redirectTo("Products.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new Product();
        $post->ProductId = $_GET['id'];
        ProductController::Delete($post);
        redirectTo("Products.php");
    }
}


