<?php
/**
 * Created by PhpStorm.
 * User: Antonia Dimitrova
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
            throw new SqlException($this->error(), $this->errorNo());
        }
    }

    public function error(){
        return mysqli_error($this->conn);
    }

    public function errorNo(){
        return mysqli_errno($this->conn);
    }

    public function escapeString($string){
        return mysqli_real_escape_string($this->conn, $string);
    }

    public function query($query){
        if(!is_string($query)){
            throw new SqlException("Query is not a string", 1);
        }
    }

    public function fetchArray($result){}

    public function fetchRow($result){}

    public function fetchAssoc($result){}

    public function fetchObject($result){}

    public function numRows($result){}

    public function close(){}
}