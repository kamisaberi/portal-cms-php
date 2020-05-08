<?php

require_once 'DataAccess.inc';
class ProjectPost {

    public $PostId;
    public $Title;
    public $Description;

    function __construct() {
        $this->PostId = 0;
        $this->Title = "";
        $this->Description = "";
    }

}

class ProjectPosts extends ArrayObject {
    function __construct() {
        
    }
}



class ProjectPostController {

    public static function Insert(ProjectPost $post) {
        $sql = "INSERT INTO `ProjectPosts` ( ";
        $sql.= "`Title`, `Description` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$post->Title', '$post->Description' ";
        $sql.= ");";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(ProjectPost $post) {
        $sql = "UPDATE `ProjectPosts` SET ";
        $sql .= "`Description` = '$post->Description', ";
        $sql .= "`Title` = '$post->Title' ";
        $sql .= " WHERE ";
        $sql .= "`PostId` = {$post->PostId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(ProjectPost $post) {
        $sql = "DELETE FROM `ProjectPosts` ";
        $sql .= " WHERE ";
        $sql .= "`PostId` = '$post->PostId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOnePost($id) {
        $sql = "SELECT * FROM `ProjectPosts` ";
        $sql .= " WHERE ";
        $sql .= "`PostId` = '$id';";
         
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $post = new ProjectPost();
            $post->PostId = $row['PostId'];
            $post->Title = $row['Title'];
            $post->Description = $row['Description'];
            return $post;
        }
    }

    public static function Fill() {
        $sql = "SELECT * FROM `ProjectPosts`";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $posts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $post = new ProjectPost();
            $post->PostId = $row['PostId'];
            $post->Title = $row['Title'];
            $post->Description = $row['Description'];
            $posts[$i] = $post;
            $i++;
        }
        return $posts;
    }

}
