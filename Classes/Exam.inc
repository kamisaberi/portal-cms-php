<?php

require_once 'DataAccess.inc';
require_once 'ExamType.inc';
require_once 'Question.inc';
require_once 'ExamQuestionLevel.inc';

class Exam {

    public $ExamId;
    public $Title;
    public $ExamType;
    public $SelectedQuestions;
    public $ExamQuestionLevel;
    public $Independent;

    function __construct() {
        $this->ExamId = 0;
        $this->Title = "";
        $this->ExamType = new ExamType();
        $this->SelectedQuestions = new Questions();
        $this->ExamQuestionLevel = new ExamQuestionLevel();
        $this->Independent = FALSE;
    }

    public function IsQuestionSelected($questionid) {

        $arr = (array) $this->SelectedQuestions;

        foreach ($arr as $key => $value) {
            if ($value->QuestionId == $questionid) {
                //echo $value->QuestionId . "<br>";
                return TRUE;
            }
        }
        return FALSE;
    }

}

class Exams extends ArrayObject {

    function __construct() {
        
    }

}

class ExamController {

    public static function Insert(Exam $exam, $lessonid) {
        $sql = "INSERT INTO `Exams` ( ";
        $sql.= "`Title` , `ExamType` , `ExamQuestionLevel` ,`Lesson` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$exam->Title' , '{$exam->ExamType->ExamTypeId}' , '{$exam->ExamQuestionLevel->ExamQuestionLevelId}'  , $lessonid";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Exam $exam, $lessonid) {
        $sql = "UPDATE `Exams` SET ";
        $sql .= "`Title` = '$exam->Title' , ";
        $sql .= "`ExamType` = '{$exam->ExamType->ExamTypeId}' , ";
        $sql .= "`ExamQuestionLevel` = '{$exam->ExamQuestionLevel->ExamQuestionLevelId}' , ";
        $sql .= "`Lesson` = '$lessonid' ";
        $sql .= " WHERE ";
        $sql .= "`ExamId` = {$exam->ExamId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Exam $exam) {
        $sql = "DELETE FROM `Exams` ";
        $sql .= " WHERE ";
        $sql .= "`ExamId` = '$exam->ExamId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneExam($id, $getQuestions = FALSE) {
        $sql = "SELECT * FROM `Exams` ";
        $sql .= " WHERE ";
        $sql .= "`ExamId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductCategory();
            $pst->ProductCategoryId = $row['ProductCategoryId'];
            $pst->Description = $row['Description'];
            $pst->Title = $row['Title'];
            if ($getQuestions == TRUE) {
                $pst->SelectedQuestions = ProductPropertyController::GetSelectedPropertiesForCategory($pst->ExamId);
            }
            return $pst;
        }
    }

    public static function Fill($getQuestions = FALSE) {
        $sql = "SELECT * FROM `Exams` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Exam();
            $pst->ExamId = $row['ExamId'];
            $pst->Content = $row['Title'];
            $pst->ExamType = ExamTypeController::FindOneExamType($row['ExamType']);
            $pst->ExamQuestionLevel = ExamQuestionLevelController::FindOneExamQuestionLevel($row['ExamQuestionLevel']);
            if ($getQuestions == TRUE) {
                $pst->SelectedQuestions = QuestionController::GetSelectedQuestonsForExam($pst->ExamId);
            }

            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetExamsForLesson($lessonid, $getQuestions = FALSE) {
        $sql = "SELECT * FROM `Exams` WHERE Lesson = '$lessonid' ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Exam();
            $pst->ExamId = $row['ExamId'];
            $pst->Title = $row['Title'];
            $pst->ExamType = ExamTypeController::FindOneExamType($row['ExamType']);
            $pst->ExamQuestionLevel = ExamQuestionLevelController::FindOneExamQuestionLevel($row['ExamQuestionLevel']);
            if ($getQuestions == TRUE) {
                $pst->SelectedQuestions = QuestionController::GetSelectedQuestonsForExam($pst->ExamId);
            }

            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
