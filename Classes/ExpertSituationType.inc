<?php

require_once 'DataAccess.inc';

class ExpertSituationType {

    public $ExpertSituationTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ExpertSituationTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ExpertSituationTypes extends ArrayObject {
    function __construct() {
        
    }
}



class ExpertSituationTypeController {

    public static function Insert(ExpertSituationType $expertsituationtype) {
        $sql = "INSERT INTO `ExpertSituationTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$expertsituationtype->Title', '$expertsituationtype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ExpertSituationType $expertsituationtype) {
        $sql = "UPDATE `ExpertSituationTypes` SET ";
        $sql .= "`Description` = '$expertsituationtype->Description', ";
        $sql .= "`Title` = '$expertsituationtype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ExpertSituationTypeId` = {$expertsituationtype->ExpertSituationTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ExpertSituationType $expertsituationtype) {
        $sql = "DELETE FROM `ExpertSituationTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ExpertSituationTypeId` = '$expertsituationtype->ExpertSituationTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneExpertSituationType($id) {
        $sql = "SELECT * FROM `ExpertSituationTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ExpertSituationTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExpertSituationType();
            $pst->ExpertSituationTypeId= $row['ExpertSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ExpertSituationTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExpertSituationType();
            $pst->ExpertSituationTypeId = $row['ExpertSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
