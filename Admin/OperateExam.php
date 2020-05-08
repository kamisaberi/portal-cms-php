<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/Exam.inc'; ?>
<?php

require_once '../Classes/Exam.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new Exam();
        $post->Title = $_POST['Title'];
        $post->ExamType->ExamTypeId = $_POST['ExamType'];
        $post->ExamQuestionLevel->ExamQuestionLevelId = $_POST['ExamQuestionLevel'];

        ExamController::Insert($post, $_POST['LessonId']);
        redirectTo("Exams.php?lessonid={$_POST['LessonId']}");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new Exam();
        $post->ExamId = $_POST['ExamId'];
        $post->Title = $_POST['Title'];
        $post->ExamType->ExamTypeId = $_POST['ExamType'];
        $post->ExamQuestionLevel->ExamQuestionLevelId = $_POST['ExamQuestionLevel'];

        ExamController::Update($post, $_POST['LessonId']);
        redirectTo("Exams.php?lessonid={$_POST['LessonId']}");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new Exam();
        $post->ExamId = $_GET['id'];
        ExamController::Delete($post);
        redirectTo("Exams.php?lessonid={$_GET['lessonid']}");
    }
}


