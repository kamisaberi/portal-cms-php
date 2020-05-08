<?php require_once 'Template/top2.php'; ?>
<?php require_once '../Classes/Question.inc'; ?>
<?php

require_once '../Classes/Question.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['cm'] == 'add') {
        $post = new Question();
        $post->Content = $_POST['Content'];
        $post->QuestionType->QuestionTypeId = $_POST['QuestionType'];
        $post->ExamQuestionLevel->ExamQuestionLevelId = $_POST['ExamQuestionLevel'];
        QuestionController::Insert($post, $_POST['LessonId']);
        redirectTo("Questions.php?lessonid={$_POST['LessonId']}");
    } elseif ($_POST['cm'] == 'edit') {
        $post = new Question();
        $post->QuestionId = $_POST['QuestionId'];
        $post->Content = $_POST['Content'];
        $post->QuestionType->QuestionTypeId = $_POST['QuestionType'];
        $post->ExamQuestionLevel->ExamQuestionLevelId = $_POST['ExamQuestionLevel'];
        QuestionController::Update($post, $_POST['LessonId']);
        redirectTo("Questions.php?lessonid={$_POST['LessonId']}");
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $post = new Question();
        $post->QuestionId = $_GET['id'];
        QuestionController::Delete($post);
        redirectTo("Questions.php?lessonid={$_GET['lessonid']}");
    }
}


