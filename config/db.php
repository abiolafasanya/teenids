<?php

class Database {

    private $host = "localhost";
    private $username= "root";
    private $password = "";
    private $db_name = "teenids";
    private $conn;

    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username,$this->password, $this->db_name);
        }
        catch(Exception $e) {
            $error = "connection error: ".$e->getMessage();
            echo $error;
        }

        return $this->conn;
    }  
    
}

?>