<?php

require_once 'DataAccess.inc';

class SiteItem {

    public $SiteItemId;
    public $Title;
    public $Description;

    function __construct() {
        $this->SiteItemId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}

class SiteItems extends ArrayObject {

    function __construct() {
        
    }

}

class SiteItemController {

    public static function Insert(SiteItem $siteitem) {
        $sql = "INSERT INTO `SiteItems` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$siteitem->Title', '$siteitem->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(SiteItem $siteitem) {
        $sql = "UPDATE `SiteItems` SET ";
        $sql .= "`Description` = '$siteitem->Description', ";
        $sql .= "`Title` = '$siteitem->Title' ";
        $sql .= " WHERE ";
        $sql .= "`SiteItemId` = {$siteitem->SiteItemId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(SiteItem $siteitem) {
        $sql = "DELETE FROM `SiteItems` ";
        $sql .= " WHERE ";
        $sql .= "`SiteItemId` = '$siteitem->SiteItemId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneSiteItem($id) {
        $sql = "SELECT * FROM `SiteItems` ";
        $sql .= " WHERE ";
        $sql .= "`SiteItemId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new SiteItem();
            $pst->SiteItemId = $row['SiteItemId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function FindAssignedItemsForMemberType($membertypeid) {
        $sql = "SELECT SiteItems.SiteItemId, SiteItems.Title, SiteItems.Description  FROM AssignedItems
INNER JOIN MemberTypes ON AssignedItems.MemberType = MemberTypes.MemberTypeId
INNER JOIN SiteItems ON AssignedItems.SiteItem = SiteItems.SiteItemId
WHERE MemberTypes.MemberTypeId ={$membertypeid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new SiteItem();
            $pst->SiteItemId = $row['SiteItemId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function Fill() {
        $sql = "SELECT * FROM `SiteItems` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new SiteItem();
            $pst->SiteItemId = $row['SiteItemId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
