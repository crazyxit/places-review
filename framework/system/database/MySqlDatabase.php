<?php
/**
 * Created by PhpStorm.
 * User: Antonia Dimitrova
 * Date: 22.1.2017 г.
 * Time: 16:12
 */
class MySqlDatabase implements IDatabase{
    /**
     * @var mysqli
     */
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

        $result = $this->conn->query($query);
        if (!$result){
            throw new SqlException($this->error(), $this->errorNo());
        }

        return $result;
    }

    public function fetchArray($result){
        if (!$result){
            throw new SqlException("No result", 2);
        }

        return mysqli_fetch_array($result);
    }

    public function fetchArrayWithQuery($query){
        $result = $this->query($query);
        return $this->fetchArray($result);
    }

    public function fetchRow($result){
        if (!$result){
            throw new SqlException("No result", 2);
        }

        return mysqli_fetch_row($result);
    }

    public function fetchRowWithQuery($query){
        $result = $this->query($query);
        return $this->fetchRow($result);
    }

    public function fetchAssoc($result){
        if (!$result){
            throw new SqlException("No result", 2);
        }

        return mysqli_fetch_assoc($result);
    }

    public function fetchAssocWithQuery($query){
        $result = $this->query($query);
        return $this->fetchAssoc($result);
    }

    public function fetchObject($result){
        if (!$result){
            throw new SqlException("No result", 2);
        }

        return mysqli_fetch_object($result);
    }

    public function fetchObjectWithQuery($query){
        $result = $this->query($query);
        return $this->fetchObject($result);
    }

    public function fetchObjectArray($result){
        if (!$result){
            throw new SqlException("No result", 2);
        }

        $array = array();
        while ($row = $this->fetchObject($result)) {
            array_push($array, $row);
        }

        return $array;
    }

    public function fetchObjectArrayWithQuery($query){
        $result = $this->query($query);
        return $this->fetchObjectArray($result);
    }

    public function numRows($result){
        if (!$result){
            throw new SqlException("No result", 4);
        }

        return mysqli_num_rows($result);
    }

    public function numRowsWithQuery($query){
        $result = $this->query($query);
        return $this->numRows($result);
    }

    public function close(){
        return mysqli_close($this->conn);
    }
}