<?php

require_once 'DataAccess.inc';

class ProductProperty {

    public $ProductPropertyId;
    public $Title;
    public $Description;
    public $Values;
    public $Value;
                function __construct() {
        $this->ProductPropertyId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->Values = "";
        $this->Value = "";
    }

}

class ProductProperties extends ArrayObject {

    function __construct() {
        
    }

}

class ProductPropertyController {

    public static function Insert(ProductProperty $productproperty) {
        $sql = "INSERT INTO `ProductProperties` ( ";
        $sql.= "`Title`, `Description` ,`Values` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$productproperty->Title', '$productproperty->Description' ,'$productproperty->Values' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProductProperty $productproperty) {
        $sql = "UPDATE `ProductProperties` SET ";
        $sql .= "`Description` = '$productproperty->Description', ";
        $sql .= "`Title` = '$productproperty->Title' , ";
        $sql .= "`Values` = '$productproperty->Values' ";
        $sql .= " WHERE ";
        $sql .= "`ProductPropertyId` = {$productproperty->ProductPropertyId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProductProperty $productproperty) {
        $sql = "DELETE FROM `ProductProperties` ";
        $sql .= " WHERE ";
        $sql .= "`ProductPropertyId` = '$productproperty->ProductPropertyId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProductProperty($id) {
        $sql = "SELECT * FROM `ProductProperties` ";
        $sql .= " WHERE ";
        $sql .= "`ProductPropertyId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductProperty();
            $pst->ProductPropertyId = $row['ProductPropertyId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Values = $row['Values'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ProductProperties` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductProperty();
            $pst->ProductPropertyId = $row['ProductPropertyId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Values = $row['Values'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetSelectedPropertiesForCategory($categoryid) {
        $sql = "SELECT ProductProperties.ProductPropertyId, ProductProperties.Title,  ProductProperties.Description, ProductProperties.`Values` , ProductProductProperty.`Value`
            FROM ProductCategories 
INNER JOIN ProductPropertyPresets ON ProductCategories.ProductCategoryId = ProductPropertyPresets.ProductCategory 
INNER JOIN ProductProperties ON ProductProperties.ProductPropertyId = ProductPropertyPresets.ProductProperty
 WHERE ProductCategories.ProductCategoryId ='{$categoryid}'";

        // echo $sql;
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductProperty();
            $pst->ProductPropertyId = $row['ProductPropertyId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Values = $row['Values'];
            $pst->Value = $row['Value'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function AssignPropertiesToCategory($categoryid, $properties) {



        $SQL = "DELETE FROM ProductPropertyPresets WHERE ProductCategory=" . $categoryid;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);


        foreach ($properties as $property) {
            //echo 'asasasas<br>';
//$SQL = "SELECT * FROM ExamQuestion WHERE Exam=" . $examid . " AND Question= " . $question;
            //$db = new DataAccess();
            //if (mysqli_num_rows($db->ExecuteSelect($SQL)) == 0) {
            $SQL = "INSERT INTO ProductPropertyPresets (ProductCategory,ProductProperty) VALUES (" . $categoryid . "," . $property . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
            //}
//            for ($i = 0; $i < count($qustns); $i++) {
//                $id = $qustns[$i]->QuestionId;
//                if ($question == $id) {
//                    unset($qustns[$i]);
//                    $qustns = array_values($qustns);
//                    break;
//                }
//            }
        }

//        foreach ($qustns as $qustn) {
//            $SQL = "DELETE FROM ExamQuestion WHERE Exam=" . $exam->ExamId . " AND Question=" . $qustn->QuestionId;
//            $db = new DataAccess();
//            $db->Execute($SQL);
//        }
    }

    public static function AssignPropertiesToProduct($productid, $properties, $values) {

        $SQL = "DELETE FROM ProductProductProperty WHERE Product=" . $productid;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);

        for ($i = 0; $i < count($properties); $i++) {
            $SQL = "INSERT INTO ProductProductProperty (`Product`,`ProductProperty`,`Value`) VALUES ('$productid' , '$properties[$i]' , '$values[$i]'  )";
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

    public static function FindProductPropertiesForProduct($productid) {
        $sql = "SELECT ProductProperties.ProductPropertyId, ProductProperties.Title,  ProductProperties.Description, ProductProperties.`Values`,
ProductProductProperty.`Value`
FROM
Products 
INNER JOIN ProductProductProperty ON Products.ProductId = ProductProductProperty.Product 
INNER JOIN ProductProperties ON  ProductProperties.ProductPropertyId = ProductProductProperty.Product
WHERE Products.ProductId ={$productid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductProperty();
            $pst->ProductPropertyId = $row['ProductPropertyId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $pst->Values = $row['Values'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
