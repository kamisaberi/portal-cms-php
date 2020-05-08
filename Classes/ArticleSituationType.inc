<?php

require_once 'DataAccess.inc';

class ArticleSituationType {

    public $ArticleSituationTypeId;
    public $Title;
    public $Description;

    function __construct() {
        $this->ArticleSituationTypeId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}


class ArticleSituationTypes extends ArrayObject {
    function __construct() {
        
    }
}



class ArticleSituationTypeController {

    public static function Insert(ArticleSituationType $articlesituationtype) {
        $sql = "INSERT INTO `ArticleSituationTypes` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$articlesituationtype->Title', '$articlesituationtype->Description' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ArticleSituationType $articlesituationtype) {
        $sql = "UPDATE `ArticleSituationTypes` SET ";
        $sql .= "`Description` = '$articlesituationtype->Description', ";
        $sql .= "`Title` = '$articlesituationtype->Title' ";
        $sql .= " WHERE ";
        $sql .= "`ArticleSituationTypeId` = {$articlesituationtype->ArticleSituationTypeId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ArticleSituationType $articlesituationtype) {
        $sql = "DELETE FROM `ArticleSituationTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ArticleSituationTypeId` = '$articlesituationtype->ArticleSituationTypeId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneArticleSituationType($id) {
        $sql = "SELECT * FROM `ArticleSituationTypes` ";
        $sql .= " WHERE ";
        $sql .= "`ArticleSituationTypeId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ArticleSituationType();
            $pst->ArticleSituationTypeId= $row['ArticleSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ArticleSituationTypes` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new ArticleSituationType();
            $pst->ArticleSituationTypeId = $row['ArticleSituationTypeId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
