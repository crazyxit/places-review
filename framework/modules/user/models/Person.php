<?php
/**
 * Created by PhpStorm.
 * User: Antonia Dimitrova
 * Date: 22.1.2017 г.
 * Time: 19:12
 */
interface Person{
    public function setName($name = '');
    public function getName();
    public function setSurname($name = '');
    public function getSurname();
    public function setFamilyName($name = '');
    public function getFamilyName();
}