<?php

require("../config/db_conn.php");

// PLACEHOLDER USER ID
// THIS IS GOING TO COME FROM JWT
// FOR NOW THIS IS JUST TO MAKE SURE THE POSTS WORK
$user_id = 1;

//User Input Variable
$new_reply_data = json_decode(file_get_contents("php://input"));

//Get the id of the post this is a reply to
$post_id = $_GET["post-id"];


//Get the data for the reply variable from the json
$reply_content = $new_reply_data->reply_content;



//Check
if (!empty($new_reply_data->reply_content)){

    $createReply = new createReply_Query;
    $createReply->sql = 'INSERT INTO fiftybitdotchat.replies(user_id, post_id, reply_content)
    VALUES (:user_id, :post_id, :reply_content)';
    $createReply->user_id = $user_id;
    $createReply->post_id = $post_id;
    $createReply->reply_content = $reply_content;

    $createReply->query_db();

    http_response_code(200);
    echo json_encode(array("message" => "Post Created!"));


} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NO PARAMETERS"));
    echo json_encode(array("message02" => "$user_id"));
    echo json_encode(array("message03" => "$post_id"));
    echo json_encode(array("message05" => "$reply_content"));

}


?>