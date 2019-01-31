<?php 
class Course{
    private $courseCode;
    private $title;
    private $weeklyHours;
    
    public function __construct($courseCode, $title, $weeklyHours) {
        $this->courseCode = $courseCode;
        $this->title = $title;
        $this->weeklyHours = $weeklyHours;
    }
    
    public function getCourseCode() {
        return $this->courseCode;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getWeeklyHours() {
        return $this->weeklyHours;
    }
    
    public function __toString() {
        return $this->courseCode." ".$this->title;;
    }
}
Class Semester{
    private $semesterCode;
    private  $year;
    private $term;
    
    public function __construct($semesterCode, $year,$term) {
        $this->semesterCode = $semesterCode;
        $this->year = $year;
        $this->term = $term;
    }
    
    public function getSemesterCode(){
        return $this->semesterCode;
    }
    
    public function getYear(){
        return $this->year;
    }
    
    public function getTerm(){
        return $this->term;
    }
}


class Student{
    private $studentId;
    private $name;
    private $phone;
    private $registrations;
    
    public function __construct($studentId, $name, $phone) {
        $this->studentId = $studentId;
        $this->name = $name;
        $this->phone = $phone;
        $this->registrations = array();
    }
    
    public function getName(){
        return $this->name;
    }
    public function getStudentId(){
        return $this->studentId;
    }
    public function getPhone(){
        return $this->phone;
    }
}
  

?>