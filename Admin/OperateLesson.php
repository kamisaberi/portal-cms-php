<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/Lesson.inc'; ?>
<?php

require_once '../Classes/Lesson.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new Lesson();
        $post->Title = $_POST['Title'];
        $post->Content = $_POST['Content'];
       // echo 'OK<br>';
        LessonController::Insert($post, $_POST['CourseId']);
        redirectTo("Lessons.php?courseid={$_POST['CourseId']}");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new Lesson();
        $post->LessonId = $_POST['LessonId'];
        $post->Title = $_POST['Title'];
        $post->Content = $_POST['Content'];
        LessonController::Update($post, $_POST['CourseId']);
        redirectTo("Lessons.php?courseid={$_POST['CourseId']}");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new Lesson();
        $post->LessonId = $_GET['id'];
        LessonController::Delete($post);
        redirectTo("Lessons.php?courseid={$_GET['courseid']}");
    }
}


