<?php

require_once 'DataAccess.inc';
require_once 'Exam.inc';
require_once 'Question.inc';

class Lesson {

    public $LessonId;
    public $Title;
    public $Content;
    public $CreatedQuestions;
    public $Exams;
            

    function __construct() {
        $this->LessonId = 0;
        $this->Title = "";
        $this->Content = "";
        $this->CreatedQuestions = new Questions();
        $this->Exams = new Exams();
    }

}


class Lessons extends ArrayObject {
    function __construct() {
        
    }
}



class LessonController {

    public static function Insert(Lesson $lesson,$courseid) {
        $sql = "INSERT INTO `Lessons` ( ";
        $sql.= "`Title`, `Content`,`Course` ";
        $sql.= " ) VALUES ( ";
        $sql.= "'$lesson->Title', '$lesson->Content' , '$courseid' ";
        $sql.= ")";
        
        
       // echo $sql . "<br>";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Lesson $lesson,$courseid) {
        $sql = "UPDATE `Lessons` SET ";
        $sql .= "`Content` = '$lesson->Content', ";
        $sql .= "`Course` = '$courseid', ";
        $sql .= "`Title` = '$lesson->Title' ";
        $sql .= " WHERE ";
        $sql .= "`LessonId` = {$lesson->LessonId};";
        
        echo $sql;
        
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Lesson $lesson) {
        $sql = "DELETE FROM `Lessons` ";
        $sql .= " WHERE ";
        $sql .= "`LessonId` = '$lesson->LessonId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneLesson($id) {
        $sql = "SELECT * FROM `Lessons` ";
        $sql .= " WHERE ";
        $sql .= "`LessonId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Lesson();
            $pst->LessonId= $row['LessonId'];
            $pst->Title = $row['Title'];
            $pst->Content = $row['Content'];
            return $pst;
        }
    }

    public static function Fill($courseid) {
        $sql = "SELECT * FROM `Lessons` WHERE Course = $courseid";
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Lesson();
            $pst->LessonId = $row['LessonId'];
            $pst->Title = $row['Title'];
            $pst->Content = $row['Content'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}
