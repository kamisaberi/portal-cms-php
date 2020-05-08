<?php

require_once 'DataAccess.inc';

class ProjectLog {

    public $ProjectLogId;
    public $Description;

    function __construct() {
        $this->ProjectLogId = 0;
        $this->Description = "";
    }

}

class ProjectLogs extends ArrayObject {

    function __construct() {
        
    }

}

class ProjectLogController {

    public static function Insert(ProjectLog $projectlog) {
        $sql = "INSERT INTO `projectlogs` ( ";
        $sql.= "`Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$projectlog->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProjectLog $projectlog) {
        $sql = "UPDATE `projectlogs` SET ";
        $sql .= "`Description` = '$projectlog->Description' ";
        $sql .= " WHERE ";
        $sql .= "`ProjectLogId` = {$projectlog->ProjectLogId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProjectLog $projectlog) {
        $sql = "DELETE FROM `projectlogs` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectLogId` = '$projectlog->ProjectLogId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProjectLog($id) {
        $sql = "SELECT * FROM `projectlogs` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectLogId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectLog();
            $pst->ProjectLogId = $row['ProjectLogId'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `projectlogs` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectLog();
            $pst->ProjectLogId = $row['ProjectLogId'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function FindLogsForSituation($situationid) {

        $sql = "SELECT * from ProjectLogs WHERE ProjectSituation ={$situationid}";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $logs = new ProjectLogs();
        while ($row = mysqli_fetch_array($result)) {
            $log = new ProjectLog();
            $log->ProjectLogId = $row['ProjectLogId'];
            $log->Description = $row['Description'];
            $logs[$i] = $log;
            $i++;
        }
        return $logs;
    }

}
