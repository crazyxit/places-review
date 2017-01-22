<?php
/**
 * Created by PhpStorm.
 * User: Ani
 * Date: 22.1.2017 г.
 * Time: 15:55
 */
interface IDatabase{
    public function connect();
    public function error();
    public function errorNo();
    public static function escapeString($string);
    public function query($query);
    public function fetchArray($result);
    public function fetchRow($result);
    public function fetchAssoc($result);
    public function fetchObject($result);
    public function numRows($result);
    public function close();
}