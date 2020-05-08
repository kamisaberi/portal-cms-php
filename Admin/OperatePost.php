<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/ProjectPost.inc'; ?>
<?php

require_once '../Classes/ProjectPost.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new ProjectPost();
        $post->Title = $_POST['Title'];
        $post->Description = $_POST['Description'];
        ProjectPostController::Insert($post);
        redirectTo("Posts.php");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new ProjectPost();
        $post->PostId = $_POST['PostId'];
        $post->Title = $_POST['Title'];
        $post->Description = $_POST['Description'];
        ProjectPostController::Update($post);
        redirectTo("Posts.php");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new ProjectPost();
        $post->PostId = $_GET['id'];
        ProjectPostController::Delete($post);
        redirectTo("Posts.php");
    }
}


