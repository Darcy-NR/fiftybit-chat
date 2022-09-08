<?php

require("../config/db_conn.php");

// PLACEHOLDER USER ID
// THIS IS GOING TO COME FROM JWT
// FOR NOW THIS IS JUST TO MAKE SURE THE POSTS WORK
$user_id = 1;

//User Input Variable
$update_reply_data = json_decode(file_get_contents("php://input"));

//Post Subforum ID
$reply_id = $_GET['reply-id'];

$reply_content = $update_reply_data->reply_content;


//Check

if (!empty($update_reply_data->reply_content)){

    // if the user making this current request = the user who initially made the post\
    // this is part of authentication, its just demonstrating at the moment.
    
    $updatePost = new update_reply_Query;
    $updatePost->sql = 'UPDATE fiftybitdotchat.replies SET reply_content = :reply_content WHERE reply_id = :reply_id';
    $updatePost->user_id = $user_id;
    $updatePost->reply_id = $reply_id;
    $updatePost->reply_content = $reply_content;

    $updatePost->query_db();

    http_response_code(200);
    echo json_encode(array("message" => "Reply Updated!"));


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