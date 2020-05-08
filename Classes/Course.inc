<?php

require_once 'DataAccess.inc';
require_once 'Lesson.inc';

class Course {

    public $CourseId;
    public $Title;
    public $Description;
    public $Lessons;

    function __construct() {
        $this->CourseId = 0;
        $this->Title = "";
        $this->Description = "";
        $this->Lessons = new Lessons();
    }

}

class Courses extends ArrayObject {

    function __construct() {
        
    }

}

class CourseController {

    public static function Insert(Course $course, $expertid) {
        $sql = "INSERT INTO `Courses` ( ";
        $sql.= "`Title`, `Description` , `Expert`";
        $sql.= " ) VALUES ( ";
        $sql.= "'$course->Title', '$course->Description' , '$expertid' ";
        $sql.= ")";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Update(Course $course, $expertid) {
        $sql = "UPDATE `Courses` SET ";
        $sql .= "`Description` = '$course->Description', ";
        $sql .= "`Expert` = '$expertid', ";
        $sql .= "`Title` = '$course->Title' ";
        $sql .= " WHERE ";
        $sql .= "`CourseId` = {$course->CourseId};";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function Delete(Course $course) {
        $sql = "DELETE FROM `Courses` ";
        $sql .= " WHERE ";
        $sql .= "`CourseId` = '$course->CourseId';";
        $da = new DataAccess();
        $da->execute($sql);
    }

    public static function FindOneCourse($id) {
        $sql = "SELECT * FROM `Courses` ";
        $sql .= " WHERE ";
        $sql .= "`CourseId` = '$id';";

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Course();
            $pst->CourseId = $row['CourseId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            return $pst;
        }
    }

    public static function Fill($expertid = 0) {

        $sql = "SELECT * FROM `Courses` ";
        if ($expertid > 0) {
            $sql .= " WHERE Expert=$expertid";
        }
        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Course();
            $pst->CourseId = $row['CourseId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

    public static function GetCourses($count = 0, $method = SearchMethods::Newest) {

        $sql = "SELECT * FROM `Courses` ";

        switch ($method) {
            case SearchMethods::Newest:
                $sql.="ORDER BY CourseId DESC ";
                break;
            case SearchMethods::Oldest:
                $sql.="ORDER BY CourseId ASC ";
                break;
            case SearchMethods::BestSelling:
                $sql.="ORDER BY CourseId ASC ";
                break;
            case SearchMethods::Popular:
                $sql.="ORDER BY CourseId ASC ";
                break;
            default:
                break;
        }

        if ($count > 0) {
            $sql .= " LIMIT {$count}";
        }

        $da = new DataAccess();
        $result = $da->executeSelect($sql);
        $psts = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $pst = new Course();
            $pst->CourseId = $row['CourseId'];
            $pst->Title = $row['Title'];
            $pst->Description = $row['Description'];
            $psts[$i] = $pst;
            $i++;
        }
        return $psts;
    }

}

class CourseUIBuilder {

    public static function CreateCourseExerptTable($count, $method) {
        $courses = CourseController::GetCourses($count, $method);
        $file = "Content/Widgets/Col5CoursesTableContent.widget";

        $s = '';
        switch ($method) {
            case SearchMethods::Newest :
                $s = "جدید ترین دوره ها";
                break;

            case SearchMethods::Oldest :
                $s = "قدیمی ترین دوره ها";
                break;
            case SearchMethods::Popular :
                $s = "محبوبترین دوره ها";
                break;
            case SearchMethods::BestSelling:
                $s = "پر فروشترین دوره ها";
                break;
        }
        WidgetBuilder::createWidget($file, array($s, $courses));
    }

    public static function CreateOneCourseWidget($id) {
        $course = CourseController::FindOneCourse($id);
        $file = "Content/Widgets/Col4SquareCenterContent.widget";
        WidgetBuilder::createWidget($file, array(
            'color' => 'blue',
            'buttoncolor' => 'info',
            'imagecolor' => 'blue',
            'smalltext' => $course->Description,
            'bigtext' => $course->Title,
            'image' => 'fa-linux',
            'buttontext' => 'مشاهده اطلاعات دوره '
        ));
    }

}
