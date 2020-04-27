<?php
include __DIR__."/Person.php";

class Librarian extends Person {
    public $startYear;
    public $isExist;

    function __construct($id, $name, $password, $startYear, $isExist) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->startYear = $startYear;
        $this->isExist = $isExist;

    }

    // get methods
    public function getStartYear() {return $this->startYear;}
    public function isExist() {return $this->isExist;}

    // set methods
    public function setStartYear($startYear) {
        $this->startYear = $startYear;
    }

    public function setExistence($existence) {
        $this->isExist = $existence;
    }

}
?>