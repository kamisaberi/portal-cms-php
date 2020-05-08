<?php

require_once 'DataAccess.inc';

class TeamSituationType {

    public $TeamSituationTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->TeamSituationTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class TeamSituationTypes extends ArrayObject {
    function __construct() {
        
    }
}



class TeamSituationTypeController {

    public static function Insert(TeamSituationType $expertsituationtype) {
        $sql = "INSERT INTO `TeamSituationTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$expertsituationtype->Title', '$expertsituationtype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(TeamSituationType $expertsituationtype) {
        $sql = "UPDATE `TeamSituationTypes` SET ";
        $sql .= "`Description` = '$expertsituationtype->Description', ";
        $sql .= "`Title` = '$expertsituationtype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`TeamSituationTypeId` = {$expertsituationtype->TeamSituationTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(TeamSituationType $expertsituationtype) {
        $sql = "DELETE FROM `TeamSituationTypes` ";
        $sql .= " WHERE ";
        $sql .= "`TeamSituationTypeId` = '$expertsituationtype->TeamSituationTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneTeamSituationType($id) {
        $sql = "SELECT * FROM `TeamSituationTypes` ";
        $sql .= " WHERE ";
        $sql .= "`TeamSituationTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new TeamSituationType();
            $pst->TeamSituationTypeId= $row['TeamSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `TeamSituationTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new TeamSituationType();
            $pst->TeamSituationTypeId = $row['TeamSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
