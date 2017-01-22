<?php
/**
 * Created by PhpStorm.
 * User: Antonia Dimitrova
 * Date: 22.1.2017 г.
 * Time: 19:00
 */
interface User{
    public function setUsername($username = '');
    public function getUsername();
    public function setEmail($email = '');
    public function getEmail();
}