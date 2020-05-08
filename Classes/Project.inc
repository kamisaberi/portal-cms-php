<?php

require_once 'DataAccess.inc';
require_once 'Expert.inc';
require_once 'ProjectSituation.inc';
require_once 'ProjectPost.inc';
require_once 'Member.inc';
require_once 'Enums.inc';

class Project {

    public $ProjectId;
    public $ProjectName;
    public $Description;
    public $Post;
    public $RequiredExperts;
    public $Members;
    public $Parent;
    public $Situations;

    function __construct() {
        $this->ProjectId = 0;
        $this->ProjectName = "";
        $this->Description = "";
        $this->Post = new ProjectPost();
        $this->RequiredExperts = new Experts();
        $this->Members = new Members();
        $this->Situations = new ProjectSituations();
        $this->Parent = 0;
    }

}

class Projects extends ArrayObject {

    function __construct() {
        
    }

}

class ProjectController {

    public static function Insert(Project $project) {
        $sql = "INSERT INTO `projects` ( ";
        $sql.= "`ProjectName`, `Description` , `Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$project->ProjectName', '$project->Description' , '$project->Parent'";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Project $project) {
        $sql = "UPDATE `projects` SET ";
        $sql .= "`Description` = '$project->Description', ";
        $sql .= "`ProjectName` = '$project->ProjectName', ";
        $sql .= "`Parent` = '$project->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ProjectId` = {$project->ProjectId};";

        //echo $sql . "<br>";

        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Project $project) {
        $sql = "DELETE FROM `projects` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectId` = '$project->ProjectId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProject($id, $getExperts = FALSE, $getMembers = FALSE, $getSituations = FALSE, $getLogs = FALSE) {
        $sql = "SELECT * FROM `projects` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $project = new Project();
            $project->ProjectId = $row['ProjectId'];
            $project->ProjectName = $row['ProjectName'];
            $project->Description = $row['Description'];
            $project->Parent = $row['Parent'];


            if ($getExperts == TRUE) {
                $project->RequiredExperts = ExpertController::FindExpertsForProject($id);
            } else {
                $project->RequiredExperts = NULL;
            }

            if ($getMembers == TRUE) {
                $project->Members = MemberController::FindMembersForProject($id);
            } else {
                $project->Members = NULL;
            }

            if ($getSituations == TRUE) {
                $project->Situations = ProjectSituationController::FindSituationsForProject($id, $getLogs);
            } else {
                $project->Situations = NULL;
            }




            return $project;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `projects` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $projects = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $project = new Project();
            $project->ProjectId = $row['ProjectId'];
            $project->ProjectName = $row['ProjectName'];
            $project->Description = $row['Description'];
            $project->Parent = $row['Parent'];
            $projects[$i] = $project;
            $i++;
        }
        return $projects;
    }

    public static function FindProjectsForMember($memberid) {
        $sql = "SELECT
Projectposts.ProjectPostId as `posts.PostId` ,
Projectposts.Description as `posts.Description`,
Projectposts.Title as `posts.Title`,
projects.ProjectId as `projects.ProjectId`,
projects.ProjectName as `projects.ProjectName`,
projects.Description as `projects.Description`,
projects.Parent as `projects.Parent`
FROM
memberproject
INNER JOIN members ON members.MemberId = memberproject.Member
INNER JOIN projects ON projects.ProjectId = memberproject.Project
INNER JOIN Projectposts ON Projectposts.ProjectPostId = memberproject.Post WHERE members.MemberId ={$memberid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $projects = new Projects();
        while ($row = mysqli_fetch_array($result)) {
            $project = new Project();
            $project->ProjectId = $row['projects.ProjectId'];
            $project->ProjectName = $row['projects.ProjectName'];
            $project->Description = $row['projects.Description'];
            $project->Parent = $row['projects.Parent'];

            $PST = new ProjectPost();
            $PST->PostId = $row['posts.PostId'];
            $PST->Title = $row['posts.Title'];
            $PST->Description = $row['posts.Description'];
            $project->Post = $PST;
            $projects[$i] = $project;
            $i++;
        }
        return $projects;
    }

    public static function Count() {
        $sql = "SELECT Count(ProjectId) as `cnt` FROM `Projects` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            return $row['cnt'];
        }
    }

    public static function GetProjects($count = 0, $method = SearchMethods::Newest) {


        $sql = "SELECT * FROM `Projects` WHERE Parent =0 ";

        switch ($method) {
            case SearchMethods::Newest:
                $sql.="ORDER BY ProjectId DESC ";
                break;
            case SearchMethods::Oldest:
                $sql.="ORDER BY ProjectId ASC ";
                break;
            case SearchMethods::BestSelling:
                $sql.="ORDER BY ProjectId ASC ";
                break;
            case SearchMethods::Popular:
                $sql.="ORDER BY ProjectId ASC ";
                break;
            default:
                break;
        }

        if ($count > 0) {
            $sql .= " LIMIT {$count}";
        }

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $projects = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $project = new Project();
            $project->ProjectId = $row['ProjectId'];
            $project->ProjectName = $row['ProjectName'];
            $project->Description = $row['Description'];
            $project->Parent = $row['Parent'];
            $projects[$i] = $project;
            $i++;
        }
        return $projects;
    }

}

class ProjectUIBuilder {

    public static function CreateTotalProjectWidget() {
        $count = ProjectController::Count();
        $file = "../Content/Widgets/Col3CenterContent.widget";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'پروژه', "bigtext" => 'تعداد کل پروژه ها', "color" => 'reddeep', "image" => 'pe-7s-portfolio'));
    }

    public static function CreateTodayProjectWidget() {
        $count = ProjectController::Count();
        $file = "../Content/Widgets/Col3CenterContent.widget";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'پروژه', "bigtext" => 'پروژه های امروز', "color" => 'reddeep', "image" => 'pe-7s-portfolio'));
    }

    public static function CreateProjectBriefTable($count, $method) {
        $projects = ProjectController::GetProjects($count, $method);
        $file = "../Content/Widgets/Col6ProjectsTableContentGreen.widget";

        $s = '';
        switch ($method) {
            case SearchMethods::Newest :
                $s = "جدید ترین پروژه ها";
                break;

            case SearchMethods::Oldest :
                $s = "قدیمی ترین پروژه ها";
                break;
            case SearchMethods::Popular :
                $s = "محبوبترین پروژه ها";
                break;
            case SearchMethods::BestSelling:
                $s = "پر فروشترین پروژه ها";
                break;
        }
        WidgetBuilder::createWidget($file, array($s, $projects));
    }

    public static function CreateOneProjectDetailedWidget($id) {
        $project = ProjectController::FindOneProject($id);
        $file = "Content/Widgets/Col6DetailedProject.widget";
        WidgetBuilder::createWidget($file, array($project));
    }

    public static function CreateTotalPerTodayProjectForMemberWidget($memberid) {
        $count = ProjectController::Count();
        $file = "../Content/Widgets/Col4PieChartOrange.widget";
        WidgetBuilder::createWidget($file, array('نمودار وضعیت پروژه', 'کل', 'امروز'));
    }

    public static function CreateTodayProjectForMemberWidget($memberid) {
        $count = ProjectController::Count();
        $file = "../Content/Widgets/Col4CenterContent.widget";
        WidgetBuilder::createWidget($file, array('color' => 'orange', 'buttoncolor' => 'warning', 'bigtext' => 'تعداد پروژه های امروز', 'value' => $count, 'buttontext' => 'مشاهده اطلاعات'));
    }

    public static function CreateTotalProjectForMemberWidget($memberid) {
        $count = ProjectController::Count();
        $file = "../Content/Widgets/Col4CenterContent.widget";
        WidgetBuilder::createWidget($file, array('color' => 'orange', 'buttoncolor' => 'warning', 'bigtext' => 'تعداد کل پروژه ها', 'value' => $count, 'buttontext' => 'مشاهده اطلاعات'));
    }

}
