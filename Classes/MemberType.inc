<?php

require_once 'DataAccess.inc';
require_once 'SiteItem.inc';

class MemberType {

    public $MemberTypeId;
    public $Title;
    public $Description;
    public $AssignedItems;

    function __construct() {
        $this->MemberTypeId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->AssignedItems = new SiteItems();
    }

}

class MemberTypes extends ArrayObject {

    function __construct() {
        
    }

}

class MemberTypeController {

    public static function Insert(MemberType $membertype) {
        $sql = "INSERT INTO `MemberTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$membertype->Title', '$membertype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(MemberType $membertype) {
        $sql = "UPDATE `MemberTypes` SET ";
        $sql .= "`Description` = '$membertype->Description', ";
        $sql .= "`Title` = '$membertype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`MemberTypeId` = {$membertype->MemberTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(MemberType $membertype) {
        $sql = "DELETE FROM `MemberTypes` ";
        $sql .= " WHERE ";
        $sql .= "`MemberTypeId` = '$membertype->MemberTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneMemberType($id) {
        $sql = "SELECT * FROM `MemberTypes` ";
        $sql .= " WHERE ";
        $sql .= "`MemberTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new MemberType();
            $pst->MemberTypeId = $row['MemberTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function FindMemberTypesForMember($memberid, $getAssignedSiteItems = FALSE) {
        $sql = "SELECT MemberTypes.MemberTypeId,MemberTypes.Title,MemberTypes.Description FROM Members 
INNER JOIN MemberMemberTypes ON Members.MemberId = MemberMemberTypes.Member
INNER JOIN MemberTypes ON MemberTypes.MemberTypeId = MemberMemberTypes.MemberType
WHERE Members.MemberId ={$memberid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new MemberType();
            $pst->MemberTypeId = $row['MemberTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];


            if ($getAssignedSiteItems == TRUE) {
                $pst->AssignedItems = SiteItemController::FindAssignedItemsForMemberType($pst->MemberTypeId );
            } else {
                $pst->MemberTypes = NULL;
            }



            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function Fill() {
        $sql = "SELECT * FROM `MemberTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new MemberType();
            $pst->MemberTypeId = $row['MemberTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
