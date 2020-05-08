<?php

require_once 'DataAccess.inc';
require_once 'ProductProperty.inc';

class ArticleCategory {

    public $ArticleCategoryId;
    public $Title;
    public $Description;
    public $Parent;
    public $ProductProperties;

    function __construct() {
        $this->ArticleCategoryId = 0;
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

class ArticleCategories extends ArrayObject {

    function __construct() {
        
    }

}

class ArticleCategoryController {

    public static function Insert(ArticleCategory $articlecategory) {
        $sql = "INSERT INTO `ArticleCategories` ( ";
        $sql.= "`Title`, `Description` ,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$articlecategory->Title', '$articlecategory->Description' ,  '$articlecategory->Parent' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ArticleCategory $articlecategory) {
        $sql = "UPDATE `ArticleCategories` SET ";
        $sql .= "`Description` = '$articlecategory->Description', ";
        $sql .= "`Title` = '$articlecategory->Title' ,";
        $sql .= "`Parent` = '$articlecategory->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ArticleCategoryId` = {$articlecategory->ArticleCategoryId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ArticleCategory $articlecategory) {
        $sql = "DELETE FROM `ArticleCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ArticleCategoryId` = '$articlecategory->ArticleCategoryId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneArticleCategory($id, $getProperties = FALSE) {
        $sql = "SELECT * FROM `ArticleCategories` ";
        $sql .= " WHERE ";
        $sql .= "`ArticleCategoryId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ArticleCategory();
            $pst->ArticleCategoryId = $row['ArticleCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];


            if ($getProperties == TRUE) {
                $pst->ProductProperties = ProductPropertyController::GetSelectedPropertiesForCategory($pst->ArticleCategoryId);
            }



            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ArticleCategories` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ArticleCategory();
            $pst->ArticleCategoryId = $row['ArticleCategoryId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Parent = $row['Parent'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
