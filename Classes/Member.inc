<?php

require_once 'DataAccess.inc';
require_once 'Expert.inc';
require_once 'ProjectPost.inc';
require_once 'Project.inc';
require_once 'MemberType.inc';
require_once 'Contest.inc';
require_once 'Product.inc';

class Member {

    public $MemberId;
    public $FirstName;
    public $LastName;
    public $Profile;
    public $Sex;
    public $BirthDate;
    public $Address;
    public $Mobile;
    public $MelliCode;
    public $Email;
    public $Username;
    public $Password;
    public $AcquiredExperts;
    public $Post;
    public $Projects;
    public $MemberTypes;
    public $Contests;
    public $Products;

    function __construct() {
        $this->MemberId = 0;
        $this->FirstName = "";
        $this->LastName = "";
        $this->Profile ="";
        $this->Sex = "";
        $this->BirthDate = "";
        $this->Address = "";
        $this->Mobile = "";
        $this->MelliCode = "";
        $this->Email = "";
        $this->Username = "";
        $this->Password = "";
        $this->AcquiredExperts = new Experts();
        $this->Post = new ProjectPost();
        $this->Projects = new Projects();
        $this->Contests = new Contests();
        $this->Products = new Products();
        $this->MemberTypes = new MemberTypes();
    }

}

class Members extends ArrayObject {

    function __construct() {
        
    }

}

class MemberController {

    public static function Insert(Member $member) {
        $sql = "INSERT INTO `members` ( ";
        $sql.= "`FirstName`, `LastName`, `Profile` , `Sex`, `BirthDate`, `Address`, `MobileNummber`, `MelliCode`, `Email` ,`Username` ,`Password` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$member->FirstName', '$member->LastName', '$member->Profile' ,  '$member->Sex', '$member->BirthDate', '$member->Address', '$member->Mobile', '$member->MelliCode', '$member->Email' ,'$member->Username' , '$member->Password' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Member $member) {
        $sql = "UPDATE `members` SET ";
        $sql .= "`Address` = '$member->Address', ";
        $sql .= "`BirthDate` = '$member->BirthDate', ";
        $sql .= "`FirstName` = '$member->FirstName', ";
        $sql .= "`LastName` = '$member->LastName', ";
        $sql .= "`Profile` = '$member->Profile', ";
        $sql .= "`MelliCode` = '$member->MelliCode', ";
        $sql .= "`MobileNummber` = '$member->Mobile', ";
        $sql .= "`Email` = '$member->Email', ";
        $sql .= "`Username` = '$member->Username', ";
        $sql .= "`Password` = '$member->Password', ";
        $sql .= "`Sex` = '$member->Sex' ";
        $sql .= " WHERE ";
        $sql .= "`MemberId` = {$member->MemberId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Member $member) {
        $sql = "DELETE FROM `members` ";
        $sql .= "WHERE ";
        $sql .= "`MemberId` = '$member->MemberId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneMember($id, $getMemberTypes = FALSE, $getExperts = FALSE, $getProjects = FALSE, $getProducts = FALSE) {
        $sql = "SELECT * FROM `members` ";
        $sql .= " WHERE ";
        $sql .= "`MemberId` = '$id';";


       // echo $sql;

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $member = new Member();
            $member->Address = $row['Address'];
            $member->BirthDate = $row['BirthDate'];
            $member->FirstName = $row['FirstName'];
            $member->Profile = $row['Profile'];
            $member->Email = $row['Email'];
            $member->Username = $row['Username'];
            $member->Password = $row['Password'];
            $member->LastName = $row['LastName'];
            $member->MelliCode = $row['MelliCode'];
            $member->MemberId = $row['MemberId'];
            $member->Mobile = $row['MobileNummber'];
            $member->Sex = $row['Sex'];


            if ($getMemberTypes == TRUE) {
                $member->MemberTypes = MemberTypeController::FindMemberTypesForMember($id, TRUE);
            } else {
                $member->MemberTypes = NULL;
            }


            if ($getExperts == TRUE) {
                $member->AcquiredExperts = ExpertController::FindExpertsForMember($id);
            } else {
                $member->AcquiredExperts = NULL;
            }

            if ($getProjects == TRUE) {
                $member->Projects = ProjectController::FindProjectsForMember($id);
            } else {
                $member->Projects = NULL;
            }


            if ($getProducts == TRUE) {
                $member->Products = ProductController::FindProductsForMember($id);
            } else {
                $member->Products = NULL;
            }




            return $member;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `members` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $members = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $member = new Member();
            $member->Address = $row['Address'];
            $member->BirthDate = $row['BirthDate'];
            $member->FirstName = $row['FirstName'];
            $member->Profile = $row['Profile'];
            $member->Email = $row['Email'];
            $member->Username = $row['Username'];
            $member->Password = $row['Password'];
            $member->LastName = $row['LastName'];
            $member->MelliCode = $row['MelliCode'];
            $member->MemberId = $row['MemberId'];
            $member->Mobile = $row['MobileNummber'];
            $member->Sex = $row['Sex'];
            $members[$i] = $member;
            $i++;
        }
        return $members;
    }

    public static function FindMembersForProject($projectid) {
        $sql = "SELECT
posts.PostId as `posts.PostId` ,
posts.Description as `posts.Description`,
posts.Title as `posts.Title`,
members.MemberId as `members.MemberId`,
members.FirstName as `members.FirstName`,
members.LastName as `members.LastName`,
members.Profile as `members.Profile`,
members.Sex as `members.Sex`,
members.BirthDate as `members.BirthDate`,
members.Address as `members.Address`,
members.MobileNummber as `members.MobileNummber`,
members.MelliCode as `members.MelliCode`,
members.ImagePath as `members.ImagePath`,
members.Parent as `members.Parent`

FROM
memberproject
INNER JOIN members ON members.MemberId = memberproject.Member
INNER JOIN projects ON projects.ProjectId = memberproject.Project
INNER JOIN posts ON posts.PostId = memberproject.Post WHERE projects.ProjectId ={$projectid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $members = new Members();
        while ($row = mysqli_fetch_array($result)) {
            $member = new Member();

            $member->MemberId = $row['members.MemberId'];
            $member->FirstName = $row['members.FirstName'];
            $member->LastName = $row['members.LastName'];
            $member->Profile = $row['members.Profile'];
            $member->Mobile = $row['members.MobileNummber'];
            $member->Address = $row['members.Address'];
            $member->BirthDate = $row['members.BirthDate'];
            $member->Email = $row['Email'];
            $member->Username = $row['Username'];
            $member->Password = $row['Password'];
            $member->MelliCode = $row['members.MelliCode'];
            $member->Sex = $row['members.Sex'];

            $PST = new ProjectPost();
            $PST->PostId = $row['posts.PostId'];
            $PST->Title = $row['posts.Title'];
            $PST->Description = $row['posts.Description'];
            $member->Post = $PST;
            $members[$i] = $member;
            $i++;
        }
        return $members;
    }

    public static function Fill2() {
        $sql = "SELECT * FROM `members` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $members = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $member = new Member();
            $member->Address = $row['Address'];
            $member->BirthDate = $row['BirthDate'];
            $member->FirstName = $row['FirstName'];
            $member->Profile = $row['Profile'];
            $member->Email = $row['Email'];
            $member->Username = $row['Username'];
            $member->Password = $row['Password'];
            $member->LastName = $row['LastName'];
            $member->MelliCode = $row['MelliCode'];
            $member->MemberId = $row['MemberId'];
            $member->Mobile = $row['MobileNummber'];
            $member->Sex = $row['Sex'];
            $members[$i] = $member;
            $i++;
        }
        return $members;
    }

    public static function FindOneMemberContestScore($memberid) {
        $sql = "SELECT * FROM `members` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $members = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $member = new Member();
            $member->Address = $row['Address'];
            $member->BirthDate = $row['BirthDate'];
            $member->FirstName = $row['FirstName'];
            $member->Profile = $row['Profile'];
            $member->Email = $row['Email'];
            $member->Username = $row['Username'];
            $member->Password = $row['Password'];
            $member->LastName = $row['LastName'];
            $member->MelliCode = $row['MelliCode'];
            $member->MemberId = $row['MemberId'];
            $member->Mobile = $row['MobileNummber'];
            $member->Sex = $row['Sex'];
            $members[$i] = $member;
            $i++;
        }
        return 465;
    }

    public static function FindOneMemberExperts($memberid) {
        $sql = "SELECT * FROM `members` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $members = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $member = new Member();
            $member->Address = $row['Address'];
            $member->BirthDate = $row['BirthDate'];
            $member->FirstName = $row['FirstName'];
            $member->Profile = $row['Profile'];
            $member->Email = $row['Email'];
            $member->Username = $row['Username'];
            $member->Password = $row['Password'];
            $member->LastName = $row['LastName'];
            $member->MelliCode = $row['MelliCode'];
            $member->MemberId = $row['MemberId'];
            $member->Mobile = $row['MobileNummber'];
            $member->Sex = $row['Sex'];
            $members[$i] = $member;
            $i++;
        }
        return 465;
    }

}

class MemberUIBuilder {

    public static function CreateOneMemberWidget($memberid) {
        $member = MemberController::FindOneMember($memberid);
        $file = "Content/Widgets/Member/Col3MemberProfile.widget";
        WidgetBuilder::createWidget($file, array('member' => $member));
    }

    public static function CreateOneMemberContestScoreWidget($memberid) {
        $score = MemberController::FindOneMemberContestScore($memberid);
        $file = "Content/Widgets/Member/Col3MemberContestScore.widget";
        WidgetBuilder::createWidget($file, array('score' => $score, 'bigtext' => 'امتیاز'));
    }

    public static function CreateOneMemberExpertsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/Col3MemberExperts.widget";
        WidgetBuilder::createWidget($file, array('experts' => $experts, 'bigtext' => 'مهارت ها', 'textcolor' => 'violet'));
    }

    public static function CreateOneMemberStatsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/Col3MemberStats.widget";
        WidgetBuilder::createWidget($file, array('experts' => $experts, 'bigtext' => 'مهارت ها', 'textcolor' => 'violet'));
    }


    public static function CreateOneMemberMessagesWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Col3Messages.widget";
        WidgetBuilder::createWidget($file, array('experts' => $experts, 'bigtext' => 'مهارت ها', 'textcolor' => 'violet'));
    }



    public static function CreateOneMemberHorizontalHeaderWidget($memberid ,$navid=1) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/HorizontalProfile.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid , 'navid' => $navid ));
    }

    public static function CreateOneMemberLastProjectsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/LastProjects.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid));
    }

    public static function CreateOneMemberLastProductsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/LastProducts.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid));
    }

    public static function CreateOneMemberLastExpertsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/LastExperts.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid));
    }

    public static function CreateOneMemberLastEventsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/LastEvents.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid));
    }

    public static function CreateOneMemberLastTeamsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/LastTeams.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid));
    }

    public static function CreateOneMemberLastArticlesWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/LastArticles.widget";
        WidgetBuilder::createWidget($file, array('id' => $memberid));
    }

    public static function CreateOneMemberVisitStatisticsWidget($memberid) {
        $experts = MemberController::FindOneMemberExperts($memberid);
        $file = "Content/Widgets/Member/VisitStatistics.widget";
        WidgetBuilder::createWidget($file, array('experts' => $experts, 'bigtext' => 'مهارت ها', 'textcolor' => 'violet'));
    }


}
