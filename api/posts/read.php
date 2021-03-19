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

$num = $result->num_rows;

// get row count
if($num > 0){
//post array

$post_arr = array();
$post_arr['data'] = array();

while($row = $result->fetch_array()){
    extract($row);

    $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => html_entity_decode($body),
        'author' => $author,
        'cartegory_id' => $category_id,
        'category_name' => $category_name
    );

    // push to data
    array_push($post_aarr['data'], $post_item);
}

// turn into json & output
    echo json_encode($post_arr);
}
else{
    // no posts
    echo json_encode(
        array('message' => 'No posts found')
    );
}

?>