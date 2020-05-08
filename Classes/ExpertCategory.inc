<?php

require_once 'DataAccess.inc';
require_once 'ProductProperty.inc';

class ExpertCategory {

    public $ExpertCategoryId;
    public $Title;
    public $Description;
    public $Parent;
    public $ProductProperties;

    function __construct() {
        $this->ExpertCategoryId = 0;
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

class ExpertCategories extends ArrayObject {

    function __construct() {
        
    }

}

class ExpertCategoryController {

    public static function Insert(ExpertCategory $expertcategory) {
        $sql = "INSERT INTO `ExpertCategories` ( ";
        $sql.= "`Title`, `Description` ,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$expertcategory->Title', '$expertcategory->Description' ,  '$expertcategory->Parent' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ExpertCategory $expertcategory) {
        $sql = "UPDATE `ExpertCategories` SET ";
        $sql .= "`Description` = '$expertcategory->Description', ";
        $sql .= "`Title` = '$expertcategory->Title' ,";
        $sql .= "`Parent` = '$expertcategory->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ExpertCategoryId` = {$expertcategory->ExpertCategoryId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ExpertCategory $expertcategory) {
        $sql = "DELETE FROM `ExpertCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ExpertCategoryId` = '$expertcategory->ExpertCategoryId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneExpertCategory($id, $getProperties = FALSE) {
        $sql = "SELECT * FROM `ExpertCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ExpertCategoryId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ExpertCategory();
            $pst->ExpertCategoryId = $row['ExpertCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];


            if ($getProperties == TRUE) {
                $pst->ProductProperties = ProductPropertyController::GetSelectedPropertiesForCategory($pst->ExpertCategoryId);
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
            $pst = new ExpertCategory();
            $pst->ExpertCategoryId = $row['ExpertCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
