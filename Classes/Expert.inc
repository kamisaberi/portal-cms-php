<?php

require_once 'DataAccess.inc';
require_once 'ExpertSituationType.inc';
require_once 'Course.inc';
require_once 'ExpertCategory.inc';

class Expert {

    public $ExpertId;
    public $Title;
    public $Description;
    public $ExpertSituationType;
    public $Parent;
    public $Courses;
    public $ExpertCategory;

    function __construct() {
        $this->ExpertId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->ExpertSituationType = new ExpertSituationType();
        $this->Parent = 0;
        $this->Courses = new Courses();
        $this->ExpertCategory = new ExpertCategory();
    }

}

class Experts extends ArrayObject {

    function __construct() {
        
    }

}

class ExpertController {

    public static function Insert(Expert $expert) {
        $sql = "INSERT INTO  `experts` ( ";
        $sql.= "`Title`, `Description`,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$expert->Title', '$expert->Description' , '$expert->Parent' ";
        $sql.= ")";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Expert $expert) {
        $sql = "UPDATE `experts` SET ";
        $sql .= "`Title` = '$expert->Title', ";
        $sql .= "`Description` = '$expert->Description', ";
        $sql .= "`Parent` = '$expert->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ExpertId` = {$expert->ExpertId};";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Expert $expert) {
        $sql = "DELETE FROM `experts` ";
        $sql .= "WHERE ";
        $sql .= "`ExpertId` = '$expert->ExpertId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneExpert($id) {
        $sql = "SELECT * FROM `experts` ";
        $sql .= " WHERE ";
        $sql .= "`ExpertId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $expert = new Expert();
            $expert->ExpertId = $row['ExpertId'];
            $expert->Title = $row['Title'];
            $expert->Description = $row['Description'];
            $expert->Parent = $row['Parent'];
            return $expert;
        }
    }

    public static function FindExpertsForMember($memberid) {
        $sql = "SELECT
Expertsituationtypes.ExpertSituationTypeId as `Expertsituationtypes.ExpertSituationTypeId`,
Expertsituationtypes.Title as `Expertsituationtypes.Title` ,
Expertsituationtypes.Description as `Expertsituationtypes.Description`,
experts.ExpertId as `experts.ExpertId`,
experts.Title as `experts.Title`,
experts.Description as `experts.Description`,
experts.Parent as `experts.Parent`
FROM
experts
INNER JOIN memberexpert ON experts.ExpertId = memberexpert.Expert
INNER JOIN Expertsituationtypes ON Expertsituationtypes.ExpertSituationTypeId = memberexpert.ExpertSituation
INNER JOIN members ON members.MemberId = memberexpert.Member WHERE members.MemberId ={$memberid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $experts = new Experts();
        while ($row = mysqli_fetch_array($result)) {
            $expert = new Expert();
            $expert->ExpertId = $row['experts.ExpertId'];
            $expert->Title = $row['experts.Title'];
            $expert->Description = $row['experts.Description'];
            $expert->Parent = $row['experts.Parent'];



            $EST = new ExpertSituationType();
            $EST->ExpertSituationTypeId = $row['Expertsituationtypes.ExpertSituationTypeId'];
            $EST->Title = $row['Expertsituationtypes.Title'];
            $EST->Description = $row['Expertsituationtypes.Description'];
            $expert->ExpertSituationType = $EST;
            $experts[$i] = $expert;
            $i++;
        }
        return $experts;
    }

    public static function FindExpertsForProject($projectid) {
        $sql = "SELECT
experts.ExpertId as `experts.ExpertId`,
experts.Title as `experts.Title`,
experts.Description as `experts.Description`,
experts.Parent as `experts.Parent`
FROM
	projects
INNER JOIN projectexpert ON projects.ProjectId = projectexpert.Project
INNER JOIN experts ON experts.ExpertId = projectexpert.Expert WHERE projects.ProjectId ={$projectid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $experts = new Experts();
        while ($row = mysqli_fetch_array($result)) {
            $expert = new Expert();
            $expert->ExpertId = $row['experts.ExpertId'];
            $expert->Title = $row['experts.Title'];
            $expert->Description = $row['experts.Description'];
            $expert->Parent = $row['experts.Parent'];
            $experts[$i] = $expert;
            $i++;
        }
        return $experts;
    }

    public static function Fill() {
        $sql = "SELECT * FROM `experts` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $experts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $expert = new Expert();
            $expert->ExpertId = $row['ExpertId'];
            $expert->Title = $row['Title'];
            $expert->Description = $row['Description'];
            $expert->Parent = $row['Parent'];
            $experts[$i] = $expert;
            $i++;
        }
        return $experts;
    }

    public static function Fill2() {
        $sql = "SELECT * FROM `experts` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $experts = new Experts();
        $experts1 = new Experts();
        $i = 0;


//        foreach ($result as $key => $value) {
//            $expert = new Expert();
//            $row =$value;
//            $expert->ExpertId = $row['ExpertId'];
//            $expert->Title = $row['Title'];
//            $expert->Description = $row['Description'];
//            $expert->Parent =$row['Parent'];
//            $experts[$i] = $expert;
//            $i++;
//            
//        }
//        while ($row = mysqli_fetch_array($result)) {
//            $expert = new Expert();
//            $expert->ExpertId = $row['ExpertId'];
//            $expert->Title = $row['Title'];
//            $expert->Description = $row['Description'];
//            $experts[$i] = $expert;
//            $i++;
//        }
//        $elems = array();
//
//        echo mysqli_num_rows($result) . "<br>";
//
//
        //$result1 = ExpertController::buildTree($result, 0);
        //echo count($result1) . "<br>";
        foreach ($result as $key => $value) {
            $expert = new Expert();
            $row = $value;
            $expert->ExpertId = $row['ExpertId'];
            $expert->Title = $row['Title'];
            $expert->Description = $row['Description'];
            $expert->Parent = $row['Parent'];
            $experts[$i] = $expert;
            $i++;
        }

        //echo count($experts) . "<br>";
        //ExpertController::display_children(0, 0);
        //$experts1 = ExpertController::buildTree2($experts, 0);
        return $experts;
        //return $experts1;
    }

    public static function display_children($parent, $level) {
        $sql = "SELECT * FROM Experts  WHERE Parent=" . $parent;
        $da = new DataAccess();
        $result = $da->executeSelect($sql);

        echo " for parent  : $parent count : " . mysqli_num_rows($result) . " <br> ";
        while ($row = mysqli_fetch_array($result)) {
            //echo str_repeat('  ', $level) . $row['ExpertId'] . "n";
            ExpertController::display_children($row['ExpertId'], $level + 1);
        }
    }

}
