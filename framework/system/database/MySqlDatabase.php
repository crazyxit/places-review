<?php
/**
 * Created by PhpStorm.
 * User: Ani
 * Date: 22.1.2017 г.
 * Time: 16:12
 */
class MySqlDatabase implements IDatabase{
    private $conn;
    private $host;
    private $username;
    private $password;
    private $database;
    private $port;
    private $socket;

    public function connect($host = '', $username = '', $password = '', $database = '', $port = '', $socket = ''){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
        $this->socket = $socket;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port, $this->socket);

        if (mysqli_connect_errno()){

        }
    }

    public function error(){
        return mysqli_error($this->conn);
    }

    public function errorNo(){
        return mysqli_errno($this->conn);
    }

    public static function escapeString($string){}
    public function query($query){}
    public function fetchArray($result){}
    public function fetchRow($result){}
    public function fetchAssoc($result){}
    public function fetchObject($result){}
    public function numRows($result){}
    public function close(){}
}