<?php

require_once 'DataAccess.inc';

class ContestType {

    public $ContestTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ContestTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ContestTypes extends ArrayObject {
    function __construct() {
        
    }
}



class ContestTypeController {

    public static function Insert(ContestType $contesttype) {
        $sql = "INSERT INTO `ContestTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$contesttype->Title', '$contesttype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ContestType $contesttype) {
        $sql = "UPDATE `ContestTypes` SET ";
        $sql .= "`Description` = '$contesttype->Description', ";
        $sql .= "`Title` = '$contesttype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ContestTypeId` = {$contesttype->ContestTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ContestType $contesttype) {
        $sql = "DELETE FROM `ContestTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ContestTypeId` = '$contesttype->ContestTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneContestType($id) {
        $sql = "SELECT * FROM `ContestTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ContestTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ContestType();
            $pst->ContestTypeId= $row['ContestTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ContestTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ContestType();
            $pst->ContestTypeId = $row['ContestTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
