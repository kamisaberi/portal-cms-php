<?php

require_once 'DataAccess.inc';
require_once 'ArticleSituationType.inc';
require_once 'Course.inc';
require_once 'ArticleCategory.inc';

class Article {

    public $ArticleId;
    public $Title;
    public $Description;
    public $ArticleSituationType;
    public $Parent;
    public $Courses;
    public $ArticleCategory;

    function __construct() {
        $this->ArticleId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->ArticleSituationType = new ArticleSituationType();
        $this->Parent = 0;
        $this->Courses = new Courses();
        $this->ArticleCategory = new ArticleCategory();
    }

}

class Articles extends ArrayObject {

    function __construct() {
        
    }

}

class ArticleController {

    public static function Insert(Article $article) {
        $sql = "INSERT INTO  `Articles` ( ";
        $sql.= "`Title`, `Description`,`Parent` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$article->Title', '$article->Description' , '$article->Parent' ";
        $sql.= ")";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Article $article) {
        $sql = "UPDATE `Articles` SET ";
        $sql .= "`Title` = '$article->Title', ";
        $sql .= "`Description` = '$article->Description', ";
        $sql .= "`Parent` = '$article->Parent' ";
        $sql .= " WHERE ";
        $sql .= "`ArticleId` = {$article->ArticleId};";
        echo $sql;
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Article $article) {
        $sql = "DELETE FROM `Articles` ";
        $sql .= "WHERE ";
        $sql .= "`ArticleId` = '$article->ArticleId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneArticle($id) {
        $sql = "SELECT * FROM `Articles` ";
        $sql .= " WHERE ";
        $sql .= "`ArticleId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $article = new Article();
            $article->ArticleId = $row['ArticleId'];
            $article->Title = $row['Title'];
            $article->Description = $row['Description'];
            $article->Parent = $row['Parent'];
            return $article;
        }
    }

    public static function FindArticlesForMember($memberid) {
        $sql = "SELECT
Articlesituationtypes.ArticleSituationTypeId as `Articlesituationtypes.ArticleSituationTypeId`,
Articlesituationtypes.Title as `Articlesituationtypes.Title` ,
Articlesituationtypes.Description as `Articlesituationtypes.Description`,
Articles.ArticleId as `Articles.ArticleId`,
Articles.Title as `Articles.Title`,
Articles.Description as `Articles.Description`,
Articles.Parent as `Articles.Parent`
FROM
Articles
INNER JOIN MemberArticle ON Articles.ArticleId = MemberArticle.Article
INNER JOIN Articlesituationtypes ON Articlesituationtypes.ArticleSituationTypeId = MemberArticle.ArticleSituation
INNER JOIN members ON members.MemberId = MemberArticle.Member WHERE members.MemberId ={$memberid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $articles = new Articles();
        while ($row = mysqli_fetch_array($result)) {
            $article = new Article();
            $article->ArticleId = $row['Articles.ArticleId'];
            $article->Title = $row['Articles.Title'];
            $article->Description = $row['Articles.Description'];
            $article->Parent = $row['Articles.Parent'];



            $EST = new ArticleSituationType();
            $EST->ArticleSituationTypeId = $row['Articlesituationtypes.ArticleSituationTypeId'];
            $EST->Title = $row['Articlesituationtypes.Title'];
            $EST->Description = $row['Articlesituationtypes.Description'];
            $article->ArticleSituationType = $EST;
            $articles[$i] = $article;
            $i++;
        }
        return $articles;
    }

    public static function FindArticlesForProject($projectid) {
        $sql = "SELECT
Articles.ArticleId as `Articles.ArticleId`,
Articles.Title as `Articles.Title`,
Articles.Description as `Articles.Description`,
Articles.Parent as `Articles.Parent`
FROM
	projects
INNER JOIN projectexpert ON projects.ProjectId = projectexpert.Project
INNER JOIN Articles ON Articles.ArticleId = projectexpert.Article WHERE projects.ProjectId ={$projectid}";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $i = 0;
        $articles = new Articles();
        while ($row = mysqli_fetch_array($result)) {
            $article = new Article();
            $article->ArticleId = $row['Articles.ArticleId'];
            $article->Title = $row['Articles.Title'];
            $article->Description = $row['Articles.Description'];
            $article->Parent = $row['Articles.Parent'];
            $articles[$i] = $article;
            $i++;
        }
        return $articles;
    }

    public static function Fill() {
        $sql = "SELECT * FROM `Articles` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $articles = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $article = new Article();
            $article->ArticleId = $row['ArticleId'];
            $article->Title = $row['Title'];
            $article->Description = $row['Description'];
            $article->Parent = $row['Parent'];
            $articles[$i] = $article;
            $i++;
        }
        return $articles;
    }

    public static function Fill2() {
        $sql = "SELECT * FROM `Articles` ";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $articles = new Articles();
        $articles1 = new Articles();
        $i = 0;


//        foreach ($result as $key => $value) {
//            $article = new Article();
//            $row =$value;
//            $article->ArticleId = $row['ArticleId'];
//            $article->Title = $row['Title'];
//            $article->Description = $row['Description'];
//            $article->Parent =$row['Parent'];
//            $articles[$i] = $article;
//            $i++;
//            
//        }
//        while ($row = mysqli_fetch_array($result)) {
//            $article = new Article();
//            $article->ArticleId = $row['ArticleId'];
//            $article->Title = $row['Title'];
//            $article->Description = $row['Description'];
//            $articles[$i] = $article;
//            $i++;
//        }
//        $elems = array();
//
//        echo mysqli_num_rows($result) . "<br>";
//
//
        //$result1 = ArticleController::buildTree($result, 0);
        //echo count($result1) . "<br>";
        foreach ($result as $key => $value) {
            $article = new Article();
            $row = $value;
            $article->ArticleId = $row['ArticleId'];
            $article->Title = $row['Title'];
            $article->Description = $row['Description'];
            $article->Parent = $row['Parent'];
            $articles[$i] = $article;
            $i++;
        }

        //echo count($articles) . "<br>";
        //ArticleController::display_children(0, 0);
        //$articles1 = ArticleController::buildTree2($articles, 0);
        return $articles;
        //return $articles1;
    }

    public static function display_children($parent, $level) {
        $sql = "SELECT * FROM Articles  WHERE Parent=" . $parent;
        $da = new DataAccess();
        $result = $da->executeSelect($sql);

        echo " for parent  : $parent count : " . mysqli_num_rows($result) . " <br> ";
        while ($row = mysqli_fetch_array($result)) {
            //echo str_repeat('  ', $level) . $row['ArticleId'] . "n";
            ArticleController::display_children($row['ArticleId'], $level + 1);
        }
    }

}
