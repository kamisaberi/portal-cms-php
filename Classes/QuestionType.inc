<?php

require_once 'DataAccess.inc';

class QuestionType {

    public $QuestionTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->QuestionTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class QuestionTypes extends ArrayObject {
    function __construct() {
        
    }
}



class QuestionTypeController {

    public static function Insert(QuestionType $questiontype) {
        $sql = "INSERT INTO `QuestionTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$questiontype->Title', '$questiontype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(QuestionType $questiontype) {
        $sql = "UPDATE `QuestionTypes` SET ";
        $sql .= "`Description` = '$questiontype->Description', ";
        $sql .= "`Title` = '$questiontype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`QuestionTypeId` = {$questiontype->QuestionTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(QuestionType $questiontype) {
        $sql = "DELETE FROM `QuestionTypes` ";
        $sql .= " WHERE ";
        $sql .= "`QuestionTypeId` = '$questiontype->QuestionTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneQuestionType($id) {
        $sql = "SELECT * FROM `QuestionTypes` ";
        $sql .= " WHERE ";
        $sql .= "`QuestionTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new QuestionType();
            $pst->QuestionTypeId= $row['QuestionTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `QuestionTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new QuestionType();
            $pst->QuestionTypeId = $row['QuestionTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
