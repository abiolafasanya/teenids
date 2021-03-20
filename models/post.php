<?php


class Post{
        // Database
        private $conn;
        private $table = 'posts';

        // Post Properties
        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $created_at;
        public $author;

        // Constructor
        public function __construct($db){
            $this->conn = $db;
        }

        // get post
        public function read(){

            $sql = 'SELECT 
                        c.name as category_name,
                        p.id,
                        p.category_id,
                        p.title,
                        p.body,
                        p.author,
                        p.created_at
                     FROM 
                     ' . $this->table . ' p
                     LEFT JOIN 
                        categories c ON p.category_id = c.id
                     ORDER BY
                        p.created_at DESC';

            // prepare statement
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();


            $stmt->store_result();
           
            // $stmt = $this->conn->query($sql);
            // // $stmt->execute();

            return $stmt;
        }
    }

?>

    