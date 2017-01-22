<?php
/**
 * Created by PhpStorm.
 * User: Antonia Dimitrova
 * Date: 22.1.2017 г.
 * Time: 19:00
 */
class Customer implements User {
    private $name;
    private $surname;
    private $familyName;
    private $email;
    private $username;

    public function setName($name = ''){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setSurname($surname = ''){
        $this->surname = $surname;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function setFamilyName($familyName = ''){
        $this->familyName = $familyName;
    }

    public function getFamilyName(){
        return $this->familyName;
    }

    public function setEmail($email = ''){
        $this->email = $email;
    }

    public function getEmail(){

    }

    public function setUsername($username = ''){
        $this->username = $username;
    }

    public function getUsername(){

    }
}