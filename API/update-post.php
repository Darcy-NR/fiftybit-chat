<?php

require("../config/db_conn.php");

// PLACEHOLDER USER ID
// THIS IS GOING TO COME FROM JWT
// FOR NOW THIS IS JUST TO MAKE SURE THE POSTS WORK
$user_id = 1;

//User Input Variable
$update_post_data = json_decode(file_get_contents("php://input"));

//Post Subforum ID
$post_id = $_GET['post-id'];

$post_title = $update_post_data->post_title;
$post_content = $update_post_data->post_content;
$post_hotlink = $update_post_data->post_hotlink;


//Check

if (!empty($update_post_data->post_title) && !empty($update_post_data->post_content)){

    // if the user making this current request = the user who initially made the post\
    // this is part of authentication, its just demonstrating at the moment.
    
    $updatePost = new update_post_Query;
    $updatePost->sql = 'UPDATE fiftybitdotchat.posts SET post_title = :post_title, 
    post_content = :post_content, post_hotlink = :post_hotlink WHERE post_id = :post_id';
    $updatePost->user_id = $user_id;
    $updatePost->post_id = $post_id;
    $updatePost->post_title = $post_title;
    $updatePost->post_content = $post_content;
    $updatePost->post_hotlink = $post_hotlink;

    $updatePost->query_db();

    http_response_code(200);
    echo json_encode(array("message" => "Post Updated!"));


} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NO PARAMETERS"));
    echo json_encode(array("message02" => "$user_id"));
    echo json_encode(array("message03" => "$subforum_id"));
    echo json_encode(array("message04" => "$post_title"));
    echo json_encode(array("message05" => "$post_content"));
    echo json_encode(array("message06" => "$post_hotlink"));
}


?>