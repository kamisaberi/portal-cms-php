<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/Course.inc'; ?>
<?php

require_once '../Classes/Course.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new Course();
        $post->Title = $_POST['Title'];
        $post->Description = $_POST['Description'];

        CourseController::Insert($post, $_POST['ExpertId']);
        redirectTo("Courses.php?expertid={$_POST['ExpertId']}");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new Course();
        $post->CourseId = $_POST['CourseId'];
        $post->Title = $_POST['Title'];
        $post->Description = $_POST['Description'];
        CourseController::Update($post, $_POST['ExpertId']);
        redirectTo("Courses.php?expertid={$_POST['ExpertId']}");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new Course();
        $post->CourseId = $_GET['id'];
        CourseController::Delete($post);
        
        redirectTo("Courses.php?expertid={$_GET['expertid']}");
    }
}


