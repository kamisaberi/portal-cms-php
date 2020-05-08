<?php

require_once 'DataAccess.inc';
require_once 'ContestType.inc';
require_once 'ExamQuestionLevel.inc';
require_once 'Question.inc';

class Contest {

    public $ContestId;
    public $Content;
    public $ContestType;
    public $ExamQuestionLevel;
    public $Value;
    public $Questions;

    function __construct() {
        $this->ContestId = 0;
        $this->Content = "";
        $this->Value = 0;
        $this->ContestType = new ContestType();
        $this->ExamQuestionLevel = new ExamQuestionLevel();
        $this->Questions = new Questions();
    }

}

class Contests extends ArrayObject {

    function __construct() {
        
    }

}

class ContestController {

    public static function Insert(Contest $contest, $lessonid) {
        $sql = "INSERT INTO `Contests` ( ";
        $sql.= "`Content`, `ContestType` , 'ExamContestLevel' ,`Lesson` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$contest->Content', '{$contest->ContestType->ContestTypeId}','{$contest->ExamQuestionLevel->ExamQuestionLevelId}' ,'$lessonid' ";
        $sql.= ")";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Contest $contest, $lessonid) {
        $sql = "UPDATE `Contests` SET ";
        $sql .= "`Content` = '$contest->Content', ";
        $sql .= "`ContestType` = '{$contest->ContestType->ContestTypeId}' , ";
        $sql .= "`ExamContestLevel` = '{$contest->ExamQuestionLevel->ExamQuestionLevelId}' , ";
        $sql .= "`Lesson` = '{$lessonid}' ";
        $sql .= " WHERE ";
        $sql .= "`ContestId` = {$contest->ContestId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Contest $contest) {
        $sql = "DELETE FROM `Contests` ";
        $sql .= " WHERE ";
        $sql .= "`ContestId` = '$contest->ContestId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneContest($id) {
        $sql = "SELECT * FROM `Contests` ";
        $sql .= " WHERE ";
        $sql .= "`ContestId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Contest();
            $pst->ContestId = $row['ContestId'];
            $pst->Content = $row['Content'];
            $pst->ContestType = ContestTypeController::FindOneContestType($row['ContestType']);
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `Contests` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Contest();
            $pst->ContestId = $row['ContestId'];
            $pst->Content = $row['Content'];
            $pst->ContestType = ContestTypeController::FindOneContestType($row['ContestType']);
            $pst->ExamQuestionLevel = ExamContestLevelController::FindOneExamContestLevel($row['ExamContestLevel']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetQuestonsForLesson($lessonid) {
        $sql = "SELECT * FROM `Contests` WHERE Lesson = '$lessonid' ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Contest();
            $pst->ContestId = $row['ContestId'];
            $pst->Content = $row['Content'];
            $pst->ContestType = ContestTypeController::FindOneContestType($row['ContestType']);
            $pst->ExamQuestionLevel = ExamContestLevelController::FindOneExamContestLevel($row['ExamContestLevel']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetSelectedQuestonsForExam($examid) {
        $sql = "SELECT Contests.ContestId, Contests.Content, Contests.Lesson, Contests.ContestType FROM Contests 
INNER JOIN ExamContest ON ExamContest.Contest = Contests.ContestId WHERE ExamContest.Exam ='{$examid}'";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Contest();
            $pst->ContestId = $row['ContestId'];
            $pst->Content = $row['Content'];
            $pst->ContestType = ContestTypeController::FindOneContestType($row['ContestType']);
            $pst->ExamQuestionLevel = ExamContestLevelController::FindOneExamContestLevel($row['ExamContestLevel']);
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function AssignContestsToExam($examid, $contests) {



        $SQL = "DELETE FROM ExamContest WHERE Exam=" . $examid;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);


        foreach ($contests as $contest) {
            //$SQL = "SELECT * FROM ExamContest WHERE Exam=" . $examid . " AND Contest= " . $contest;
            //$db = new DataAccess();
            //if (mysqli_num_rows($db->ExecuteSelect($SQL)) == 0) {
            $SQL = "INSERT INTO ExamContest (Exam,Contest) VALUES (" . $examid . "," . $contest . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
            //}
//            for ($i = 0; $i < count($qustns); $i++) {
//                $id = $qustns[$i]->ContestId;
//                if ($contest == $id) {
//                    unset($qustns[$i]);
//                    $qustns = array_values($qustns);
//                    break;
//                }
//            }
        }

//        foreach ($qustns as $qustn) {
//            $SQL = "DELETE FROM ExamContest WHERE Exam=" . $exam->ExamId . " AND Contest=" . $qustn->ContestId;
//            $db = new DataAccess();
//            $db->Execute($SQL);
//        }
    }

}
