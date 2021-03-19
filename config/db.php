<?php

class Database {

    private $host;
    private $username;
    private $password;
    private $conn;
    private $db_name;

    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host = "localhost", $this->username = "root",
             $this->password = "", $this->db_name ="teenids");
        }
        catch(Exception $e) {
            $error = "connection error: ".$e->getMessage();
            echo $error;
        }

        return $this->conn;
    }  
    
}

?>