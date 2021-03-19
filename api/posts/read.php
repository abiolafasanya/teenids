<?php   

header('Access-Control-Allow-Origiin: *');

header("Content-type: application/json");

include('../../config/db.php');
include('../../models/post.php');


$database =  new Database();
$db = $database->connect();


$post = new Post($db);


// blog post query
$result = $post->read();

$num = $result->num_rows();

if($num > 0){
//post array

$postArr = array();
$postArr['data'] = array();

while($row = $result->fetch()){

}
}

?>