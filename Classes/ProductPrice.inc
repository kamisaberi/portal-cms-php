<?php

require_once 'DataAccess.inc';

class ProductPrice {

    public $ProductPriceId;
    public $Description;
    public $Value;

    function __construct() {
        $this->ProductPriceId = 0;
        $this->Description = "";
        $this->Value =0;
    }

}


class ProductPrices extends ArrayObject {
    function __construct() {
        
    }
}



class ProductPriceController {

    public static function Insert(ProductPrice $productprice,$productid) {
        $sql = "INSERT INTO `ProductPrices` ( ";
        $sql.= "`Value`, `Description` ,`Product` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$productprice->Value', '$productprice->Description' ,'$productid' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProductPrice $productprice,$productid) {
        $sql = "UPDATE `ProductPrices` SET ";
        $sql .= "`Description` = '$productprice->Description', ";
        $sql .= "`Product` = '$productid', ";
        $sql .= "`Value` = '$productprice->Value' ";
        $sql .= " WHERE ";
        $sql .= "`ProductPriceId` = {$productprice->ProductPriceId};";
        //echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProductPrice $productprice) {
        $sql = "DELETE FROM `ProductPrices` ";
        $sql .= " WHERE ";
        $sql .= "`ProductPriceId` = '$productprice->ProductPriceId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneProductPrice($id) {
        $sql = "SELECT * FROM `ProductPrices` ";
        $sql .= " WHERE ";
        $sql .= "`ProductPriceId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductPrice();
            $pst->ProductPriceId = $row['ProductPriceId'];
            $pst->Description = $row['Description'];
            $pst->Value = $row['Value'];
            return $pst;
        }
    }

    public static function Fill($productid) {
        $sql = "SELECT * FROM `ProductPrices` WHERE Product ={$productid} ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ProductPrice();
            $pst->ProductPriceId = $row['ProductPriceId'];
            $pst->Description = $row['Description'];
            $pst->Value = $row['Value'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
