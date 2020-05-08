<?php

require_once 'DataAccess.inc';

class QuestionChoise {

    public $QuestionChoiseId;
    public $Content;

    function __construct() {
        $this->QuestionChoiseId = 0;
        $this->Content = "";
    }

}


class QuestionChoises extends ArrayObject {
    function __construct() {
        
    }
}



class QuestionChoiseController {

    public static function Insert(QuestionChoise $questionchoise, $questionid) {
        $sql = "INSERT INTO `QuestionChoises` ( ";
        $sql.= "`Content`, `Question` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$questionchoise->Content', '$questionid' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(QuestionChoise $questionchoise, $questionid) {
        $sql = "UPDATE `QuestionChoises` SET ";
        $sql .= "`Question` = '$questionid', ";
        $sql .= "`Content` = '$questionchoise->Content' ";
        $sql .= " WHERE ";
        $sql .= "`QuestionChoiseId` = {$questionchoise->QuestionChoiseId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(QuestionChoise $questionchoise) {
        $sql = "DELETE FROM `QuestionChoises` ";
        $sql .= " WHERE ";
        $sql .= "`QuestionChoiseId` = '$questionchoise->QuestionChoiseId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneQuestionChoise($id) {
        $sql = "SELECT * FROM `QuestionChoises` ";
        $sql .= " WHERE ";
        $sql .= "`QuestionChoiseId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new QuestionChoise();
            $pst->QuestionChoiseId= $row['QuestionChoiseId'];
            $pst->Content = $row['Content'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `QuestionChoises` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new QuestionChoise();
            $pst->QuestionChoiseId = $row['QuestionChoiseId'];
            $pst->Content = $row['Content'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
