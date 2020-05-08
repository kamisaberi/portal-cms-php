<?php

require_once 'DataAccess.inc';
require_once 'TeamSituationType.inc';
require_once 'Course.inc';
require_once 'TeamCategory.inc';

class Team {

    public $TeamId;
    public $Title;
    public $Description;
    public $TeamSituationType;
    public $Parent;
    public $Courses;
    public $TeamCategory;

    function __construct() {
        $this->TeamId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->TeamSituationType = new TeamSituationType();
        $this->Parent = 0;
        $this->TeamCategory = new TeamCategory();
    }

}

class Teams extends ArrayObject {

    function __construct() {
        
    }

}

class TeamController {

    public static function Insert(Team $team) {
        $sql = "INSERT INTO  `Teams` ( ";
        $sql.= "`Title`, `Description`,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$team->Title', '$team->Description' , '$team->Parent' ";
        $sql.= ")";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Team $team) {
        $sql = "UPDATE `Teams` SET ";
        $sql .= "`Title` = '$team->Title', ";
        $sql .= "`Description` = '$team->Description', ";
        $sql .= "`Parent` = '$team->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`TeamId` = {$team->TeamId};";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Team $team) {
        $sql = "DELETE FROM `Teams` ";
        $sql .= "WHERE ";
        $sql .= "`TeamId` = '$team->TeamId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneTeam($id) {
        $sql = "SELECT * FROM `Teams` ";
        $sql .= " WHERE ";
        $sql .= "`TeamId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $team = new Team();
            $team->TeamId = $row['TeamId'];
            $team->Title = $row['Title'];
            $team->Description = $row['Description'];
            $team->Parent = $row['Parent'];
            return $team;
        }
    }

    public static function FindTeamsForMember($memberid) {
        $sql = "SELECT
Teamsituationtypes.TeamSituationTypeId as `Teamsituationtypes.TeamSituationTypeId`,
Teamsituationtypes.Title as `Teamsituationtypes.Title` ,
Teamsituationtypes.Description as `Teamsituationtypes.Description`,
Teams.TeamId as `Teams.TeamId`,
Teams.Title as `Teams.Title`,
Teams.Description as `Teams.Description`,
Teams.Parent as `Teams.Parent`
FROM
Teams
INNER JOIN MemberTeam ON Teams.TeamId = MemberTeam.Team
INNER JOIN Teamsituationtypes ON Teamsituationtypes.TeamSituationTypeId = MemberTeam.TeamSituation
INNER JOIN members ON members.MemberId = MemberTeam.Member WHERE members.MemberId ={$memberid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $teams = new Teams();
        while ($row = mysqli_fetch_array($result)) {
            $team = new Team();
            $team->TeamId = $row['Teams.TeamId'];
            $team->Title = $row['Teams.Title'];
            $team->Description = $row['Teams.Description'];
            $team->Parent = $row['Teams.Parent'];



            $EST = new TeamSituationType();
            $EST->TeamSituationTypeId = $row['Teamsituationtypes.TeamSituationTypeId'];
            $EST->Title = $row['Teamsituationtypes.Title'];
            $EST->Description = $row['Teamsituationtypes.Description'];
            $team->TeamSituationType = $EST;
            $teams[$i] = $team;
            $i++;
        }
        return $teams;
    }

    public static function FindTeamsForProject($projectid) {
        $sql = "SELECT
Teams.TeamId as `Teams.TeamId`,
Teams.Title as `Teams.Title`,
Teams.Description as `Teams.Description`,
Teams.Parent as `Teams.Parent`
FROM
	projects
INNER JOIN projectexpert ON projects.ProjectId = projectexpert.Project
INNER JOIN Teams ON Teams.TeamId = projectexpert.Team WHERE projects.ProjectId ={$projectid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $teams = new Teams();
        while ($row = mysqli_fetch_array($result)) {
            $team = new Team();
            $team->TeamId = $row['Teams.TeamId'];
            $team->Title = $row['Teams.Title'];
            $team->Description = $row['Teams.Description'];
            $team->Parent = $row['Teams.Parent'];
            $teams[$i] = $team;
            $i++;
        }
        return $teams;
    }

    public static function Fill() {
        $sql = "SELECT * FROM `Teams` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $teams = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $team = new Team();
            $team->TeamId = $row['TeamId'];
            $team->Title = $row['Title'];
            $team->Description = $row['Description'];
            $team->Parent = $row['Parent'];
            $teams[$i] = $team;
            $i++;
        }
        return $teams;
    }

    public static function Fill2() {
        $sql = "SELECT * FROM `Teams` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $teams = new Teams();
        $teams1 = new Teams();
        $i = 0;


//        foreach ($result as $key => $value) {
//            $team = new Team();
//            $row =$value;
//            $team->TeamId = $row['TeamId'];
//            $team->Title = $row['Title'];
//            $team->Description = $row['Description'];
//            $team->Parent =$row['Parent'];
//            $teams[$i] = $team;
//            $i++;
//            
//        }
//        while ($row = mysqli_fetch_array($result)) {
//            $team = new Team();
//            $team->TeamId = $row['TeamId'];
//            $team->Title = $row['Title'];
//            $team->Description = $row['Description'];
//            $teams[$i] = $team;
//            $i++;
//        }
//        $elems = array();
//
//        echo mysqli_num_rows($result) . "<br>";
//
//
        //$result1 = TeamController::buildTree($result, 0);
        //echo count($result1) . "<br>";
        foreach ($result as $key => $value) {
            $team = new Team();
            $row = $value;
            $team->TeamId = $row['TeamId'];
            $team->Title = $row['Title'];
            $team->Description = $row['Description'];
            $team->Parent = $row['Parent'];
            $teams[$i] = $team;
            $i++;
        }

        //echo count($teams) . "<br>";
        //TeamController::display_children(0, 0);
        //$teams1 = TeamController::buildTree2($teams, 0);
        return $teams;
        //return $teams1;
    }

    public static function display_children($parent, $level) {
        $sql = "SELECT * FROM Teams  WHERE Parent=" . $parent;
        $da = new DataAccess();
        $result = $da->executeSelect($sql);

        echo " for parent  : $parent count : " . mysqli_num_rows($result) . " <br> ";
        while ($row = mysqli_fetch_array($result)) {
            //echo str_repeat('  ', $level) . $row['TeamId'] . "n";
            TeamController::display_children($row['TeamId'], $level + 1);
        }
    }

}
