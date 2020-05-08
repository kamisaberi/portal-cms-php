<?php

require_once 'DataAccess.inc';
require_once 'QuestionType.inc';
require_once 'QuestionChoise.inc';
require_once 'ExamQuestionLevel.inc';

class Question {

    public $QuestionId;
    public $Content;
    public $QuestionType;
    public $QuestionChoises;
    public $ExamQuestionLevel;

    function __construct() {
        $this->QuestionId = 0;
        $this->Content = "";
        $this->QuestionType = new QuestionType();
        $this->QuestionChoises = new QuestionChoises();
        $this->ExamQuestionLevel = new ExamQuestionLevel();
    }

}

class Questions extends ArrayObject {

    function __construct() {
        
    }

}

class QuestionController {

    public static function Insert(Question $question, $lessonid) {
        $sql = "INSERT INTO `Questions` ( ";
        $sql.= "`Content`, `QuestionType` , 'ExamQuestionLevel' ,`Lesson` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$question->Content', '{$question->QuestionType->QuestionTypeId}','{$question->ExamQuestionLevel->ExamQuestionLevelId}' ,'$lessonid' ";
        $sql.= ")";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Question $question, $lessonid) {
        $sql = "UPDATE `Questions` SET ";
        $sql .= "`Content` = '$question->Content', ";
        $sql .= "`QuestionType` = '{$question->QuestionType->QuestionTypeId}' , ";
        $sql .= "`ExamQuestionLevel` = '{$question->ExamQuestionLevel->ExamQuestionLevelId}' , ";
        $sql .= "`Lesson` = '{$lessonid}' ";
        $sql .= " WHERE ";
        $sql .= "`QuestionId` = {$question->QuestionId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Question $question) {
        $sql = "DELETE FROM `Questions` ";
        $sql .= " WHERE ";
        $sql .= "`QuestionId` = '$question->QuestionId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneQuestion($id) {
        $sql = "SELECT * FROM `Questions` ";
        $sql .= " WHERE ";
        $sql .= "`QuestionId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Question();
            $pst->QuestionId = $row['QuestionId'];
            $pst->Content = $row['Content'];
            $pst->QuestionType = QuestionTypeController::FindOneQuestionType($row['QuestionType']);
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `Questions` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Question();
            $pst->QuestionId = $row['QuestionId'];
            $pst->Content = $row['Content'];
            $pst->QuestionType = QuestionTypeController::FindOneQuestionType($row['QuestionType']);
            $pst->ExamQuestionLevel = ExamQuestionLevelController::FindOneExamQuestionLevel($row['ExamQuestionLevel']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetQuestonsForLesson($lessonid) {
        $sql = "SELECT * FROM `Questions` WHERE Lesson = '$lessonid' ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Question();
            $pst->QuestionId = $row['QuestionId'];
            $pst->Content = $row['Content'];
            $pst->QuestionType = QuestionTypeController::FindOneQuestionType($row['QuestionType']);
            $pst->ExamQuestionLevel = ExamQuestionLevelController::FindOneExamQuestionLevel($row['ExamQuestionLevel']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetSelectedQuestonsForExam($examid) {
        $sql = "SELECT Questions.QuestionId, Questions.Content, Questions.Lesson, Questions.QuestionType FROM Questions 
INNER JOIN ExamQuestion ON ExamQuestion.Question = Questions.QuestionId WHERE ExamQuestion.Exam ='{$examid}'";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Question();
            $pst->QuestionId = $row['QuestionId'];
            $pst->Content = $row['Content'];
            $pst->QuestionType = QuestionTypeController::FindOneQuestionType($row['QuestionType']);
            $pst->ExamQuestionLevel = ExamQuestionLevelController::FindOneExamQuestionLevel($row['ExamQuestionLevel']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function AssignQuestionsToExam($examid, $questions) {



        $SQL = "DELETE FROM ExamQuestion WHERE Exam=" . $examid;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);


        foreach ($questions as $question) {
            //$SQL = "SELECT * FROM ExamQuestion WHERE Exam=" . $examid . " AND Question= " . $question;
            //$db = new DataAccess();
            //if (mysqli_num_rows($db->ExecuteSelect($SQL)) == 0) {
            $SQL = "INSERT INTO ExamQuestion (Exam,Question) VALUES (" . $examid . "," . $question . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
            //}
//            for ($i = 0; $i < count($qustns); $i++) {
//                $id = $qustns[$i]->QuestionId;
//                if ($question == $id) {
//                    unset($qustns[$i]);
//                    $qustns = array_values($qustns);
//                    break;
//                }
//            }
        }

//        foreach ($qustns as $qustn) {
//            $SQL = "DELETE FROM ExamQuestion WHERE Exam=" . $exam->ExamId . " AND Question=" . $qustn->QuestionId;
//            $db = new DataAccess();
//            $db->Execute($SQL);
//        }
    }

}
