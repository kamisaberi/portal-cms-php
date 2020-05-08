<?php

require_once 'DataAccess.inc';

class ExamQuestionLevel {

    public $ExamQuestionLevelId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ExamQuestionLevelId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ExamQuestionLevels extends ArrayObject {
    function __construct() {
        
    }
}



class ExamQuestionLevelController {

    public static function Insert(ExamQuestionLevel $examquestionlevel) {
        $sql = "INSERT INTO `ExamQuestionLevels` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$examquestionlevel->Title', '$examquestionlevel->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ExamQuestionLevel $examquestionlevel) {
        $sql = "UPDATE `ExamQuestionLevels` SET ";
        $sql .= "`Description` = '$examquestionlevel->Description', ";
        $sql .= "`Title` = '$examquestionlevel->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ExamQuestionLevelId` = {$examquestionlevel->ExamQuestionLevelId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ExamQuestionLevel $examquestionlevel) {
        $sql = "DELETE FROM `ExamQuestionLevels` ";
        $sql .= " WHERE ";
        $sql .= "`ExamQuestionLevelId` = '$examquestionlevel->ExamQuestionLevelId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneExamQuestionLevel($id) {
        $sql = "SELECT * FROM `ExamQuestionLevels` ";
        $sql .= " WHERE ";
        $sql .= "`ExamQuestionLevelId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExamQuestionLevel();
            $pst->ExamQuestionLevelId= $row['ExamQuestionLevelId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ExamQuestionLevels` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExamQuestionLevel();
            $pst->ExamQuestionLevelId = $row['ExamQuestionLevelId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
