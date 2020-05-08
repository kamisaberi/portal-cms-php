<?php

require_once 'DataAccess.inc';

class ProjectSituationType {

    public $ProjectSituationTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ProjectSituationTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ProjectSituationTypes extends ArrayObject {
    function __construct() {
        
    }
}



class ProjectSituationTypeController {

    public static function Insert(ProjectSituationType $projectsituationtype) {
        $sql = "INSERT INTO `projectsituationtypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$projectsituationtype->Title', '$projectsituationtype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProjectSituationType $projectsituationtype) {
        $sql = "UPDATE `projectsituationtypes` SET ";
        $sql .= "`Description` = '$projectsituationtype->Description', ";
        $sql .= "`Title` = '$projectsituationtype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ProjectSituationTypeId` = {$projectsituationtype->ProjectSituationTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProjectSituationType $projectsituationtype) {
        $sql = "DELETE FROM `projectsituationtypes` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectSituationTypeId` = '$projectsituationtype->ProjectSituationTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProjectSituationType($id) {
        $sql = "SELECT * FROM `projectsituationtypes` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectSituationTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectSituationType();
            $pst->ProjectSituationTypeId= $row['ProjectSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `projectsituationtypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectSituationType();
            $pst->ProjectSituationTypeId = $row['ProjectSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
