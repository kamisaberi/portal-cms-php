<?php

require_once 'DataAccess.inc';
require_once 'ProductProperty.inc';

class ProjectCategory {

    public $ProjectCategoryId;
    public $Title;
    public $Description;
    public $Parent;
    public $ProductProperties;

    function __construct() {
        $this->ProjectCategoryId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->Parent = 0;
        $this->ProductProperties = new ProductProperties();
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

class ProjectCategories extends ArrayObject {

    function __construct() {
        
    }

}

class ProjectCategoryController {

    public static function Insert(ProjectCategory $projectcategory) {
        $sql = "INSERT INTO `ProjectCategories` ( ";
        $sql.= "`Title`, `Description` ,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$projectcategory->Title', '$projectcategory->Description' ,  '$projectcategory->Parent' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProjectCategory $projectcategory) {
        $sql = "UPDATE `ProjectCategories` SET ";
        $sql .= "`Description` = '$projectcategory->Description', ";
        $sql .= "`Title` = '$projectcategory->Title' ,";
        $sql .= "`Parent` = '$projectcategory->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ProjectCategoryId` = {$projectcategory->ProjectCategoryId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProjectCategory $projectcategory) {
        $sql = "DELETE FROM `ProjectCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectCategoryId` = '$projectcategory->ProjectCategoryId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProjectCategory($id, $getProperties = FALSE) {
        $sql = "SELECT * FROM `ProjectCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ProjectCategoryId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectCategory();
            $pst->ProjectCategoryId = $row['ProjectCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];


            if ($getProperties == TRUE) {
                $pst->ProductProperties = ProductPropertyController::GetSelectedPropertiesForCategory($pst->ProjectCategoryId);
            }



            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ProjectCategories` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProjectCategory();
            $pst->ProjectCategoryId = $row['ProjectCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
