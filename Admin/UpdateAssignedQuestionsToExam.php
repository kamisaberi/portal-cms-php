
<?php

session_start();
require_once '../Classes/Exam.inc';
require_once '../Classes/Question.inc';
require_once '../Classes/Functions.inc';

if (isset($_POST['ExamId'])) {
    //$termid = OptionEx::GetValue("ActiveTerm");
    $questions = array();
    if (isset($_POST['questions'])) {
        $questions = $_POST['questions'];
    }
    echo $_POST['ExamId'] . "<br>";
    $examid = $_POST['ExamId'];
    QuestionController::AssignQuestionsToExam($examid, $questions);
    redirectTo("Exams.php?lessonid={$_POST['LessonId']}");
}


