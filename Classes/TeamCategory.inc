<?php

require_once 'DataAccess.inc';
require_once 'ProductProperty.inc';

class TeamCategory {

    public $TeamCategoryId;
    public $Title;
    public $Description;
    public $Parent;

    function __construct() {
        $this->TeamCategoryId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->Parent = 0;
    }

    public function IsPropertySelected($propertyid) {

        $arr = (array) $this->ProductProperties;

        foreach ($arr as $key => $value) {
            if ($value->ProductPropertyId == $propertyid) {
                //echo $value->QuestionId . "<br>";
                return TRUE;
            }
        }
        return FALSE;
    }

}

class TeamCategories extends ArrayObject {

    function __construct() {
        
    }

}

class TeamCategoryController {

    public static function Insert(TeamCategory $expertcategory) {
        $sql = "INSERT INTO `ExpertCategories` ( ";
        $sql.= "`Title`, `Description` ,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$expertcategory->Title', '$expertcategory->Description' ,  '$expertcategory->Parent' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(TeamCategory $expertcategory) {
        $sql = "UPDATE `ExpertCategories` SET ";
        $sql .= "`Description` = '$expertcategory->Description', ";
        $sql .= "`Title` = '$expertcategory->Title' ,";
        $sql .= "`Parent` = '$expertcategory->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`TeamCategoryId` = {$expertcategory->TeamCategoryId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(TeamCategory $expertcategory) {
        $sql = "DELETE FROM `ExpertCategories` ";
        $sql .= " WHERE ";
        $sql .= "`TeamCategoryId` = '$expertcategory->TeamCategoryId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneTeamCategory($id, $getProperties = FALSE) {
        $sql = "SELECT * FROM `ExpertCategories` ";
        $sql .= " WHERE ";
        $sql .= "`TeamCategoryId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new TeamCategory();
            $pst->TeamCategoryId = $row['TeamCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];


            if ($getProperties == TRUE) {
                $pst->ProductProperties = ProductPropertyController::GetSelectedPropertiesForCategory($pst->TeamCategoryId);
            }



            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ExpertCategories` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new TeamCategory();
            $pst->TeamCategoryId = $row['TeamCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
