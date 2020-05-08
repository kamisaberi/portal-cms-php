<?php

require_once 'DataAccess.inc';

class ProductLevel {

    public $ProductLevelId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ProductLevelId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ProductLevels extends ArrayObject {
    function __construct() {
        
    }
}



class ProductLevelController {

    public static function Insert(ProductLevel $productlevel) {
        $sql = "INSERT INTO `ProductLevels` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$productlevel->Title', '$productlevel->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProductLevel $productlevel) {
        $sql = "UPDATE `ProductLevels` SET ";
        $sql .= "`Description` = '$productlevel->Description', ";
        $sql .= "`Title` = '$productlevel->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ProductLevelId` = {$productlevel->ProductLevelId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProductLevel $productlevel) {
        $sql = "DELETE FROM `ProductLevels` ";
        $sql .= " WHERE ";
        $sql .= "`ProductLevelId` = '$productlevel->ProductLevelId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProductLevel($id) {
        $sql = "SELECT * FROM `ProductLevels` ";
        $sql .= " WHERE ";
        $sql .= "`ProductLevelId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductLevel();
            $pst->ProductLevelId= $row['ProductLevelId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ProductLevels` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductLevel();
            $pst->ProductLevelId = $row['ProductLevelId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
