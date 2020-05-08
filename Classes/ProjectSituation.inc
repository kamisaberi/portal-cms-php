<?php

require_once 'DataAccess.inc';
require_once 'ProjectSituationType.inc';
require_once 'ProjectLog.inc';

class ProjectSituation {

    public $ProjectSituationId;
    public $Title;
    public $Description;
    public $Date;
    public $ProjectSituationType;
    public $ProjectLogs;

    function __construct() {
        $this->ProjectSituationId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->Date = "";
        $this->ProjectSituationType = new ProjectSituationType();
        $this->ProjectLogs = new ProjectLogs();
    }

}

class ProjectSituations extends ArrayObject {

    function __construct() {
        
    }

}

class ProjectSituationController {

    public static function Insert(ProjectSituation $projectsituation,$projectid) {
        $sql = "INSERT INTO `projectsituations` ( ";
        $sql.= "`Title`, `Description` ,`Date` , `ProjectSituationType` ,`Project` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$projectsituation->Title', '$projectsituation->Description' , '$projectsituation->Date' , '{$projectsituation->ProjectSituationType->ProjectSituationTypeId}' , '{$projectid}'";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProjectSituation $projectsituation,$projectid) {
        $sql = "UPDATE `projectsituations` SET ";
        $sql .= "`Description` = '$projectsituation->Description', ";
        $sql .= "`Date` = '$projectsituation->Date', ";
        $sql .= "`ProjectSituationType` = '{$projectsituation->ProjectSituationType->ProjectSituationTypeId}', ";
        $sql .= "`Project` = '{$projectid}', ";
        $sql .= "`Title` = '$projectsituation->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ProjectSituationId` = {$projectsituation->ProjectSituationId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProjectSituation $projectsituation) {
        $sql = "DELETE FROM `projectsituations` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectSituationId` = '$projectsituation->ProjectSituationId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProjectSituation($id) {
        $sql = "SELECT * FROM `projectsituations` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectSituationId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectSituation();
            $pst->ProjectSituationId = $row['ProjectSituationId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `projectsituations` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectSituation();
            $pst->ProjectSituationId = $row['ProjectSituationId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function FindSituationsForProject($projectid, $getLogs = FALSE) {
        $sql = "SELECT
projectsituationtypes.ProjectSituationTypeId as `projectsituationtypes.ProjectSituationTypeId`,
projectsituationtypes.Title as `projectsituationtypes.Title`,
projectsituationtypes.Description as `projectsituationtypes.Description`,
projectsituations.ProjectSituationId as `projectsituations.ProjectSituationId`,
projectsituations.Project as `projectsituations.Project`,
projectsituations.ProjectSituationType as `projectsituations.ProjectSituationType`,
projectsituations.Date as `projectsituations.Date`,
projectsituations.Description as `projectsituations.Description`
FROM
projectsituations
INNER JOIN projectsituationtypes ON projectsituationtypes.ProjectSituationTypeId = projectsituations.ProjectSituationType
INNER JOIN projects ON projects.ProjectId = projectsituations.Project
WHERE projects.ProjectId ={$projectid}";



        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $situations = new Experts();
        while ($row = mysqli_fetch_array($result)) {
            $situation = new ProjectSituation();
            $situation->ProjectSituationId = $row['projectsituations.ProjectSituationId'];
            $situation->Title = $row['projectsituations.Title'];
            $situation->Description = $row['projectsituations.Description'];
            $situation->Date = $row['projectsituations.Date'];

            $pst = new ProjectSituationType();
            $pst->Title = $row['projectsituationtypes.Title'];
            $pst->ProjectSituationTypeId = $row['projectsituationtypes.ProjectSituationTypeId'];
            $pst->Description = $row['projectsituationtypes.Description'];

            $situation->ProjectSituationType = $pst;

            if ($getLogs == TRUE) {
                $situation->ProjectLogs = ProjectLogController::FindLogsForSituation($situation->ProjectSituationId);
            } else {
                $situation->ProjectLogs = NULL;
            }



            $situations[$i] = $situation;
            $i++;
        }
        return $situations;
    }

}
