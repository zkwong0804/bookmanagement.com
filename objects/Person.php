<?php
class Person {
    public $id;
    public $name;
    public $password;

    // get public functions
    public function getID() {return $this->id;}
    public function getName() {return $this->name;}
    public function getPassword() {return $this->password;}

    // set public functions
    public function setID($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
?>