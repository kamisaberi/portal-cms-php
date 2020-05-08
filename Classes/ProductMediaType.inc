<?php

require_once 'DataAccess.inc';

class ProductMediaType {

    public $ProductMediaTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ProductMediaTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ProductMediaTypes extends ArrayObject {
    function __construct() {
        
    }
}



class ProductMediaTypeController {

    public static function Insert(ProductMediaType $productmediatype) {
        $sql = "INSERT INTO `ProductMediaTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$productmediatype->Title', '$productmediatype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProductMediaType $productmediatype) {
        $sql = "UPDATE `ProductMediaTypes` SET ";
        $sql .= "`Description` = '$productmediatype->Description', ";
        $sql .= "`Title` = '$productmediatype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ProductMediaTypeId` = {$productmediatype->ProductMediaTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProductMediaType $productmediatype) {
        $sql = "DELETE FROM `ProductMediaTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ProductMediaTypeId` = '$productmediatype->ProductMediaTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProductMediaType($id) {
        $sql = "SELECT * FROM `ProductMediaTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ProductMediaTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductMediaType();
            $pst->ProductMediaTypeId= $row['ProductMediaTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ProductMediaTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductMediaType();
            $pst->ProductMediaTypeId = $row['ProductMediaTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
