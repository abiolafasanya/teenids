<?php
    // $conn = include_once('config/conn.php');


    class Post{
        // Database
        private $conn;
        private $table;

        // Post Properties
        public $id;
        public $title;
        public $body;
        public $category_id;
        public $category_name;
        public $created_at;
        public $author;

        // Constructor
        public function __construct($db){
            $this->conn = $db;
        }

        // get post
        public function read(){
            $sql = "SELECT 
                        c.name AS category_name,
                        p.id,
                        p.category_id,
                        p.author,
                        p.body,
                        p.title,
                        p.created_at
                     FROM 
                     '.$this->table.' p
                     LEFT JOIN 
                        categories c ON p.category_id = c.id
                     ORDER BY
                        p.created_at DESC
                     ";

            // prepare statement
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt;
        }
    }



?>