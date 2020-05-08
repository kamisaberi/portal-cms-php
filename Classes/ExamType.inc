<?php

require_once 'DataAccess.inc';

class ExamType {

    public $ExamTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ExamTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ExamTypes extends ArrayObject {
    function __construct() {
        
    }
}



class ExamTypeController {

    public static function Insert(ExamType $examtype) {
        $sql = "INSERT INTO `ExamTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$examtype->Title', '$examtype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ExamType $examtype) {
        $sql = "UPDATE `ExamTypes` SET ";
        $sql .= "`Description` = '$examtype->Description', ";
        $sql .= "`Title` = '$examtype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ExamTypeId` = {$examtype->ExamTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ExamType $examtype) {
        $sql = "DELETE FROM `ExamTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ExamTypeId` = '$examtype->ExamTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneExamType($id) {
        $sql = "SELECT * FROM `ExamTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ExamTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExamType();
            $pst->ExamTypeId= $row['ExamTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ExamTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExamType();
            $pst->ExamTypeId = $row['ExamTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
