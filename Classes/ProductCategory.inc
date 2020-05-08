<?php

require_once 'DataAccess.inc';
require_once 'ProductProperty.inc';

class ProductCategory {

    public $ProductCategoryId;
    public $Title;
    public $Description;
    public $Parent;
    public $ProductProperties;

    function __construct() {
        $this->ProductCategoryId = 0;
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

class ProductCategories extends ArrayObject {

    function __construct() {
        
    }

}

class ProductCategoryController {

    public static function Insert(ProductCategory $productcategory) {
        $sql = "INSERT INTO `ProductCategories` ( ";
        $sql.= "`Title`, `Description` ,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$productcategory->Title', '$productcategory->Description' ,  '$productcategory->Parent' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProductCategory $productcategory) {
        $sql = "UPDATE `ProductCategories` SET ";
        $sql .= "`Description` = '$productcategory->Description', ";
        $sql .= "`Title` = '$productcategory->Title' ,";
        $sql .= "`Parent` = '$productcategory->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ProductCategoryId` = {$productcategory->ProductCategoryId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProductCategory $productcategory) {
        $sql = "DELETE FROM `ProductCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ProductCategoryId` = '$productcategory->ProductCategoryId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProductCategory($id, $getProperties = FALSE) {
        $sql = "SELECT * FROM `ProductCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ProductCategoryId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductCategory();
            $pst->ProductCategoryId = $row['ProductCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];


            if ($getProperties == TRUE) {
                $pst->ProductProperties = ProductPropertyController::GetSelectedPropertiesForCategory($pst->ProductCategoryId);
            }



            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ProductCategories` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductCategory();
            $pst->ProductCategoryId = $row['ProductCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
